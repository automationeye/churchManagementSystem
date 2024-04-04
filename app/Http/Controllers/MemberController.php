<?php

namespace App\Http\Controllers;

use App\Member;
use DataTables;
use App\CollectionsType;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class MemberController extends Controller
{
    private $user;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->user = \Auth::guard('admin')->user();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = \Auth::guard('admin')->user();
        if ($request->draw) {
            return DataTables::of($user->members)->make(true);
        } else {
            return view('members.all'); //, compact('members'));
        }
    }


    public function announce()
    {
        // Retrieve the announcement details
        $announcement = DB::table('announcements')->first(); // Retrieves the first row

        if ($announcement) {
            $announcement_content = $announcement->details; // Assuming 'details' is the column name
            // Now $announcement_content contains the content of the first row of the 'announcements' table
            // You can use this content as needed
        } else {
            // Handle the case when there are no announcements in the table
            $announcement_content = null; // Set to null or handle accordingly
        }

        // Count total announcements
        $announcements_info = DB::table('announcements')->count();

        // Pass data to the view
        return view('members.member', compact('announcement_content', 'announcements_info'));
    }





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('members.register'); //, compact('classes', 'sections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate email
        $member = Member::where('email', $request->email)->get(['id'])->first();
        if ($member) {
            return response()->json(['status' => false, 'text' => "The email ($request->email) already exists for a member."]);
            // return redirect()->back()->with('status', "The email ($request->email) already exists for a member.");
        }
        // validate Phone
        $member = Member::where('phone', $request->phone)->get(['id'])->first();
        if ($member) {
            return response()->json(['status' => false, 'text' => "The phone ($request->phone) already exists for a member."]);
        }

        $user = \Auth::guard('admin')->user();

        $email = $request->email;
        $firstname = $request->firstname;
        $lastname = $request->lastname;
        $phone = $request->phone;
        $password = $request->password; // You should hash the password for security
        $team = $request->team;


        $member = new Member();

        $member->email = $email;
        $member->firstname = $firstname;
        $member->lastname = $lastname;
        $member->phone = $phone;
        $member->password = bcrypt($password);
        $member->team = $team;






        if ($member->save()) {
            return redirect('members/all')->with('success', 'Member added successfuly');
        } else {
            return redirect('members/register')->with('error', 'Member not added');
        }

        $originalNumber = $request->get('phone');

        // Remove the first character (0)
        $modifiedNumber = substr($originalNumber, 1);

        $message = "Hello $firstname, Welcome to new breed chapel. We are happy to have you service with us";
        $this->sendSmsUsingCurl($modifiedNumber, '20642', 'plain', $message);
        return response()->json(['status' => true, 'text' => "Member Successfully registered"]);
        // return redirect()->route('member.register.form')->with('status', 'Member Successfully registered');
    }


    function sendSmsUsingCurl($recipient, $senderId, $messageType, $message)
    {
        $url = 'https://sms.coptic.co.ke/api/v3/sms/send';

        $headers = [
            'Authorization: Bearer 8|xOJrpxUxElUvaWhsQ6cA54AZ6fxdLh2moxyYZLUu9db2c618',
            'Accept: application/json',
            'Content-Type: application/json',
        ];

        $data = [
            'recipient' => $recipient,
            'sender_id' => $senderId,
            'type' => $messageType,
            'message' => $message,
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        try {
            $response = curl_exec($ch);
            $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

            if ($statusCode >= 200 && $statusCode < 300) {
                // Request was successful
                $responseData = json_decode($response, true);

                // Add your logic here based on the response

                return ['success' => true, 'message' => $responseData];
            } else {
                // Request failed
                return ['success' => false, 'message' => 'Request failed with status code: ' . $statusCode];
            }
        } catch (\Exception $e) {
            // Handle any exceptions that occur during the cURL request
            return ['success' => false, 'message' => $e->getMessage()];
        } finally {
            curl_close($ch);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member, $id)
    {
        $member = Member::find($id);
        $user = \Auth::guard('admin')->user();
        // dd($user->members()->where('members.id', $id)->get());
        $c_types = CollectionsType::getTypes();
        // $sql = 'SELECT COUNT(case when attendance = "yes" then 1 end) AS present, COUNT(case when attendance = "no" then 1 end) AS absent,
        // MONTH(attendance_date) AS month FROM `members_attendances` WHERE YEAR(attendance_date) = YEAR(CURDATE()) AND member_id = '.$member->id.' GROUP BY month';
        $attendance = $member->attendances()->selectRaw("SUM(CASE when attendance = 'yes' then 1 else 0 end) As yes,
        SUM(CASE when attendance = 'no' then 1 else 0 end) As no")->first(); //->sum('');
        // dd($attendance);
        return view('members.profile', compact('member', 'attendance', 'member', 'c_types'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        return view('members.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => ' email| required|string|max:255',
            'phone' => 'required|string|max:255',
            'team' => 'required|string|max:255',
            // Add validation rules for other member details if needed
        ]);

        // Update the member's details
        $member->update($validatedData);

        // Redirect the user back with a success message
        return redirect()->route('members.all')->with('status', 'Member details updated successfully.');
    }


    public function read()
    {

        // Retrieve the currently authenticated user
        $user = Auth::user();

        // Pass the user's data to the view
        return view('members.memberprofile', compact('user'));
    }


    public function team()
    {
        // Retrieve the currently authenticated user
        $user = Auth::user();

        // Retrieve team members of the same team
        $teamMembers = Member::where('team', $user->team)->get();

        // Pass the team members to the view


        return view('members.team', compact('teamMembers'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        $member->delete();

        // Redirect back to the members list or any other appropriate page
        return redirect()->route('members.all')->with('success', 'Member deleted successfully');
    }

    public function delete(Request $request)
    {
        $failed = 0;
        $text = "All selected members deleted successfully";
        foreach ($request->id as $key => $value) {
            # code...
            $member = Member::whereId($value)->first();
            if ($member) {
                $member->delete();
            } else {
                $failed++;
                $text = "$failed Operations could not be performed";
            }
        }
        return response()->json(['status' => true, 'text' => $text]);
    }

    public function getRelative(Request $request, $search_term)
    {

        $user = \Auth::guard('admin')->user();

        $sql = "SELECT * from members WHERE branch_id = '$user->id' AND  MATCH (firstname,lastname)
      AGAINST ('$search_term')";
        $members = \DB::select($sql);
        return response()->json(['success' => true, "result" => sizeof($members) > 0 ? $members : ['message' => 'no result found']]);
    }

    public function modify($id)
    {
        $user = \Auth::guard('admin')->user();
        $member = Member::whereId($id)->where('branch_id', $user->id)->first();
        if (!$member) {
            return 'Member Not exists';
        }
        return view('members.edit', compact('member'));
    }

    public function upgrade(Request $request)
    {
        $status = false;
        $user = Member::where('id', $request->id)->first()->upgrade();
        if ($user) {
            $status = true;
            $text = "$user is now a full member";
        } else {
            $text = "Error occured Please try again";
        }
        return response()->json(['status' => $status, 'text' => $text]);
    }

    public function uploadImg(Request $request)
    {
        $image_name = 'profile.png'; // default profile image
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $input['imagename'] = ($image->getClientOriginalExtension() != '') ? time() . '.' . $image->getClientOriginalExtension() : time() . '.jpg';
            print_r($input);

            $destinationPath = public_path('/images');

            $image->move($destinationPath, $input['imagename']);

            $image_name = $input['imagename'];

            $user = Member::orderBy('id', 'desc')->first();
            $user->photo = $image_name;
            $user->save();
            return response()->json(['status' => true,]);
        }
        return response()->json(['status' => false, 'text' => "No photo file"]);
    }

    public function testMail(Request $request)
    {
        return new \App\Mail\MailToMember($request, \Auth::guard('admin')->user());
    }

    public function updateMember(Request $request)
    {
        $member = Member::whereId($request->id)->first();
        // dd($request);
        if ($member) {
            $errors = [];
            $fields = (array)$request->request; //->parameters;//->ParameterBag->parameters;
            $fields = $fields["\x00*\x00parameters"];
            foreach ($fields as $key => $value) {
                if ($key != 'id' && $key != '_token' && $key != 'action') {
                    $member->$key = $request->$key;
                }
            }
            try {
                $member->save();
            } catch (\Exception $e) {
                array_push($errors, $e);
                // dd($e);
                return response()->json(['status' => false, 'text' => $e->errorInfo[2]]);
            }
        } else {
            return response()->json(['status' => false, 'text' => "Member does not exist"]);
        }
        return response()->json(['status' => true, 'text' => "Member has been updated!"]);
    }

    public function attendance($id, Request $request)
    {
        $member = Member::find($id);
        if ($member) {
            $member = $member->attendances()->with(['service_types'])->get();
        }
        // dd($member);
        return DataTables::of($member)->make(true);
    }

    public function memberAnalysis(Request $request)
    {
        $user = \Auth::guard('admin')->user();
        $c_types = \App\CollectionsType::getTypes();
        $savings = \App\MemberCollection::rowToColumn(\App\MemberCollection::where('branch_id', $user->id)->where('member_id', $request->id)->get());
        $interval = $request->interval;
        $group = $request->group;
        $months = [];
        for ($i = $interval - 1; $i >= 0; $i--) {
            $t = 'M';
            switch ($group) {
                case 'day':
                    $t = 'D';
                    break;
                case 'week':
                    $t = 'W';
                    break;
                case 'month':
                    $t = 'M';
                    break;
                case 'year':
                    $t = 'Y';
                    break;
            }
            $dateOrNot = $group == 'month' ? date('Y-m-01') : '';
            $months[$i] = date($t, strtotime($dateOrNot . "-$i $group")); //1 week ago
        }
        $collections2 = $this->calculateSingleTotal($savings, $group);
        $dt = (function ($savings, $c_types, $months, $group) {
            $output = [];
            foreach ($months as $key => $value) {
                $month = $value;
                $found = false;
                foreach ($savings as $collection) {
                    if ($value == $collection->$group) {
                        $found = true;
                        $output[] = $this->yData($collection, $c_types, $value);
                    }
                }
                if (!$found) {
                    $output[] = $this->noData($c_types, $value);
                }
            }
            return $output;
        })($collections2, $c_types, $months, $group);
        // dd($dt);
        return response()->json($dt);
    }

    private function yData($collection, $c_types, $value)
    {
        $y = new \stdClass();
        $y->y = $value;
        $i = 1;
        $size = sizeof($c_types);
        foreach ($c_types as $key => $value) {
            $name = $value->name;
            $amount = isset($collection->$name) ? $collection->$name : 0;
            $y->$name = $amount;
            $i++;
        }
        return $y; //. "},";
    }

    private function noData($c_types, $value)
    {
        $y = new \stdClass();
        $y->y = $value;
        $i = 1;
        foreach ($c_types as $key => $value) {
            $name = $value->name;
            $y->$name = 0;
            $i++;
        }
        return $y; //. "},";
    }

    private function calculateSingleTotal($savings, $type)
    {
        $obj = [];
        foreach ($savings as $key => $value) {
            switch ($type) {
                case 'day':
                    $t = 'D';
                    break;
                case 'week':
                    $t = 'W';
                    break;
                case 'month':
                    $t = 'M';
                    break;
                case 'year':
                    $t = 'Y';
                    break;
            }
            $date = date($t, strtotime($value->date_collected));
            $year = (int)substr($value->date_collected, 0, 4);
            foreach ($value->amounts as $ke => $valu) {
                if (isset($obj[$date])) {
                    if (isset($obj[$date]->$ke)) {
                        $obj[$date]->$ke += $valu;
                    } else {
                        $obj[$date]->$ke = $valu;
                    }
                } else {
                    $obj[$date] = new \stdClass();
                    $obj[$date]->$ke = $valu;
                    $obj[$date]->$type = $date;
                }
            }
        }
        return $obj;
    }
    // count(case when sex = 'male' then 1 end) AS male, count(case when sex = 'female' then 1 end) AS female,
    public function memberRegStats(Request $request)
    {
        $user = \Auth::guard('admin')->user();
        $members = Member::selectRaw("COUNT(id) as total, SUM(CASE WHEN sex='male' THEN 1 ELSE 0 END) AS male, SUM(CASE WHEN sex='female' THEN 1 ELSE 0 END) AS female,
    MONTH(member_since) AS month")->whereRaw("member_since > DATE(now() + INTERVAL - 12 MONTH)")->where("branch_id", $user->id)->groupBy("month")->get();
        // dd($members);
        $group = 'month';
        $months = [];
        $interval = 0;
        $ii = 11;
        $c_types = array('male', 'female');
        for ($i = $interval; $i <= 11; $i++) {
            $t = 'M';
            switch ($group) {
                case 'day':
                    $t = 'D';
                    break;
                case 'week':
                    $t = 'W';
                    break;
                case 'month':
                    $t = 'M';
                    break;
                case 'year':
                    $t = 'Y';
                    break;
            }
            $dateOrNot = $group == 'month' ? date('Y-m-01') : '';
            $months[$ii] = date($t, strtotime($dateOrNot . "-$i $group")); //1 week ago
            $ii--;
        }

        $dt = (function ($members, $c_types, $months, $group) {
            $output = [];
            foreach ($months as $key => $value) {
                $month = $value;
                $found = false;
                foreach ($members as $member) {
                    $m;
                    switch ($member->$group) {
                        case 1:
                            $m = 'Jan';
                            break;
                        case 2:
                            $m = 'Feb';
                            break;
                        case 3:
                            $m = 'Mar';
                            break;
                        case 4:
                            $m = 'Apr';
                            break;
                        case 5:
                            $m = 'May';
                            break;
                        case 6:
                            $m = 'Jun';
                            break;
                        case 7:
                            $m = 'Jul';
                            break;
                        case 8:
                            $m = 'Aug';
                            break;
                        case 9:
                            $m = 'Sep';
                            break;
                        case 10:
                            $m = 'Oct';
                            break;
                        case 11:
                            $m = 'Nov';
                            break;
                        case 12:
                            $m = 'Dec';
                            break;
                    }
                    // dd($m);
                    if ($month == $m) {
                        $found = true;
                        $output[] = $this->flotY($member, $c_types, $key);
                    }
                }
                if (!$found) {
                    $output[] = $this->flotNoData($c_types, $key);
                }
            }
            return $output;
        })($members, $c_types, $months, $group);

        return $dt;
    }

    private function flotY($member, $c_types, $value)
    {
        $y = [];
        $y['month'] = $value;
        $i = 1;
        $size = sizeof($c_types);
        foreach ($c_types as $key => $value) {
            $name = $value;
            $amount = isset($member->$name) ? $member->$name : 0;
            $y[$name] = $amount;
            $i++;
        }
        return $y;
    }

    private function flotNoData($c_types, $value)
    {
        $y = [];
        $y['month'] = $value;
        $i = 1;
        foreach ($c_types as $key => $value) {
            $name = $value;
            $y[$name] = 0;
            $i++;
        }
        return $y;
    }

    public function calculateSingleTotalCollection($savings, $type)
    {
        $obj = [];
        foreach ($savings as $key => $value) {
            switch ($type) {
                case 'day':
                    $t = 'D';
                    break;
                case 'week':
                    $t = 'W';
                    break;
                case 'month':
                    $t = 'M';
                    break;
                case 'year':
                    $t = 'Y';
                    break;
            }
            $date = date($t, strtotime($value->date_collected));
            $year = (int)substr($value->date_collected, 0, 4);

            if ($type == 'year') {
                foreach ($value as $k => $v) {
                    // dd($savings);
                    $year = substr($k, 0, 4);
                    foreach ($v['amounts'] as $savingName => $savingAmount) {
                        if (!isset($obj->$savingName)) {
                            $obj->$savingName = new \stdClass();
                        }
                        if (isset($obj->$savingName->$year)) {
                            $obj->$savingName->$year += $savingAmount;
                        } else {
                            $obj->$savingName->$year = $savingAmount;
                        }
                    }
                }
            }
        }
        return $obj;
    }
}
