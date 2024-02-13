<?php

namespace App\Http\Controllers;

use App\Admins;
use App\Admin;
use Illuminate\Http\Request;
use Dcblogdev\Countries\Facades\Countries;
use \App\User;
use \App\Member;
use \App\Event;
use \App\Branch;
use \App\Channel;
use \App\Setting;
use \App\Leave;
use Auth;

class VisitorController extends Controller
{

    public function landing()
    {


        $events = Event::where('id', '!=', -1)
            ->orderBy('ID', 'DESC')
            ->get();

        return view('landing', compact('events'));
    }

    public function memberreg()
    {
        return view('members.selfreg');
    }


    public function adminreg()
    {
        return view('admin.admin.addadmin');
    }

    public function leaderlogin(){

        return view('admin.admin.login');

    }

    public function leaderloginpost(Request $request){
        

      

        $request->validate([
            'phone' => 'required|string',
            'password' => 'required|string',
        ]);

        // Retrieve the user by phone number
        $user = Admins::where('phone', $request->phone)->first();

        
        // Check if the user exists and the password is correct
        if (Auth::guard('leader')->attempt(['phone' => $request->phone, 'password' => $request->password])) {

            // dd(Auth::guard());
            // Authenticate the user
            Auth::login($user);

            // Authentication successful, redirect to dashboard or any other route
            return redirect()->route('leaderdash')->with('success', 'Authentication successful!');
        }


        // Authentication failed, redirect back with error message
        return redirect()->back()->with('error', 'Invalid phone number or password.');
    }


    public function channels()
    {
        $channels = Channel::orderBy('channel_name', 'ASC')->paginate(10);
        return view('members.channels', compact('channels'));
    }

    public function updateteam(Request $request)
    {

        $tel = Auth::user()->phone;
        $team = $request->team;

        $update = Member::where('phone', $tel)->update(['team' => $team]);

        if ($update) {
            return redirect()->back()->with('success', 'Team successfuly updated!');
        } else {
            return redirect()->back()->with('error', 'An error occured!');
        }
    }


    public function leaverequest(){
        // return view ('members.requestleave');
    }


    public function leaderdash(){
        return view ('admin.admin.dashboard');
    }

    public function addmember()
    {
        return view('admin.admin.addmember');
    }

    public function editmember()
    {
        return view('admin.admin.editmember');
    }


    public function addadmin()
    {
        return view('admin.admin.addadmin');
    }

    public function acceptleave()
    {
        return view('admin.admin.acceptleave');
    }

    public function approvemember(Request $request){

        $id=$request->id;
        
        if($id==null){
            return redirect()->route('managemember')->with('error', 'An error occured!');
        }
        $update=Member::where('id',$id)->update(['team_status'=>1]);
        if($update){
            return redirect()->route('managemember')->with('success', 'Member approved successfully!');
        }else{
            return redirect()->route('managemember')->with('error', 'An error occured!');
        }
    }

    public function managemember()
    {
        $user=Auth::guard('leader')->user();

        $team=$user->team;

        //get members in that team
        $members=Member::where('team',$team)
        ->orderBy('id','DESC')
        ->get();
        return view('admin.admin.managemember',compact('members'));
    }

    public function meeting()
    {
        return view('admin.admin.meeting');
    }


    public function memberlog()
    {
        return view('members.selflog');
    }

    public function adminlog()
    {
        return view('admin.admin.login');
    }

    public function edit()
    {
        return view('admin.admin.edit');
    }

    public function announcement()
    {
        return view('admin.admin.announcement');
    }

    public function editannouncement()
    {
        return view('admin.admin.editannouncement');
    }

    public function newmeeting()
    {
        return view('admin.admin.newmeeting');
    }

    public function viewmeeting()
    {
        return view('admin.admin.viewmeeting');
    }

    public function profile()
    {
        return view('admin.admin.profile');
    }


    public function contributions()
    {
        return view('members.contributions');
    }

    public function member(){

        $leaves=Leave::where('id','!=',-1)->orderBy('id','DESC')->get();

        return view('members.member',compact('leaves'));
    }

    public function team()
    {
        return view('members.team');
    }

    public function contact()
    {
        return view('members.contact-support');
    }



    public function memberregpost(Request $request)
    {
        // Validate the incoming data
        $validatedData = $request->validate([
            'firstname' => 'required|string|max:255',
            'email' => 'email|unique:members,email',
            'phone' => 'nullable|string|max:20',
            'password' => 'required|string|min:6',
        ]);

        // Check if the phone number exists
        if ($validatedData['phone']) {
            $existingMember = Member::where('phone', $validatedData['phone'])->first();
            if ($existingMember) {
                return redirect()->back()->with('error', 'Phone number already exists.');
            }
        }

        // Create a new member instance
        $member = new Member();
        $member->firstname = $validatedData['firstname'];
        $member->email = $validatedData['email'];
        $member->phone = $validatedData['phone'];
        $member->password = bcrypt($validatedData['password']); // You should hash the password for security
        $member->save();
        Auth::login($member);

        return redirect()->route('memberdash')->with('success', 'Registration successful!');
    }


    public function adminregpost(Request $request)
    {
        // Validate the incoming data
        $validatedData = $request->validate([
            'firstname' => 'required|string|max:255',
            'email' => 'email|unique:members,email',
            'phone' => 'nullable|string|max:20',
            'password' => 'required|string|min:6',
        ]);

        // Check if the phone number exists
        if ($validatedData['phone']) {
            $existingMember = MemberAdmin::where('phone', $validatedData['phone'])->first();
            if ($existingMember) {
                return redirect()->back()->with('error', 'Phone number already exists.');
            }
        }

        // Create a new member instance
        $member = new Admin();
        $member->firstname = $validatedData['firstname'];
        $member->email = $validatedData['email'];
        $member->phone = $validatedData['phone'];
        $member->password = bcrypt($validatedData['password']); // You should hash the password for security
        $member->save();
        Auth::login($member);

        return redirect()->route('leaderdash')->with('success', 'Registration successful!');
    }








    public function memberlogpost(Request $request)
    {
        // Validate the request data
        $request->validate([
            'phone' => 'required|string',
            'password' => 'required|string',
        ]);

        // Retrieve the user by phone number
        $user = Member::where('phone', $request->phone)->first();

        // Check if the user exists and the password is correct
        if ($user && password_verify($request->password, $user->password)) {
            // Authenticate the user
            Auth::login($user);

            // Authentication successful, redirect to dashboard or any other route
            return redirect()->route('memberdash')->with('success', 'Authentication successful!');
        }

        // Authentication failed, redirect back with error message
        return redirect()->back()->with('error', 'Invalid phone number or password.');
    }



    public function adminlogpost(Request $request)
    {
        // Validate the request data
        $request->validate([
            'phone' => 'required|string',
            'password' => 'required|string',
        ]);

        // Retrieve the user by phone number
        $user = MemberAdmin::where('phone', $request->phone)->first();

        // Check if the user exists and the password is correct
        if ($user && password_verify($request->password, $user->password)) {
            // Authenticate the user
            Auth::login($user);

            // Authentication successful, redirect to dashboard or any other route
            return redirect()->route('memberdash')->with('success', 'Authentication successful!');
        }

        // Authentication failed, redirect back with error message
        return redirect()->back()->with('error', 'Invalid phone number or password.');
    }






    public function events()
    {
        $events = Event::where('id', '!=', -1)
            ->orderBy('ID', 'DESC')
            ->get();

        return view('events', compact('events'));
    }
    //
    public function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE)
    {
        $output = NULL;
        if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
            $ip = $_SERVER["REMOTE_ADDR"];
            if ($deep_detect) {
                if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                    $ip = $_SERVER['HTTP_CLIENT_IP'];
            }
        }
        $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
        $support    = array("country", "countrycode", "state", "region", "city", "location", "address");
        $continents = array(
            "AF" => "Africa",
            "AN" => "Antarctica",
            "AS" => "Asia",
            "EU" => "Europe",
            "OC" => "Australia (Oceania)",
            "NA" => "North America",
            "SA" => "South America"
        );
        if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
            $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
            if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
                switch ($purpose) {
                    case "location":
                        $output = array(
                            "city"           => @$ipdat->geoplugin_city,
                            "state"          => @$ipdat->geoplugin_regionName,
                            "country"        => @$ipdat->geoplugin_countryName,
                            "country_code"   => @$ipdat->geoplugin_countryCode,
                            "continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
                            "continent_code" => @$ipdat->geoplugin_continentCode
                        );
                        break;
                    case "address":
                        $address = array($ipdat->geoplugin_countryName);
                        if (@strlen($ipdat->geoplugin_regionName) >= 1)
                            $address[] = $ipdat->geoplugin_regionName;
                        if (@strlen($ipdat->geoplugin_city) >= 1)
                            $address[] = $ipdat->geoplugin_city;
                        $output = implode(", ", array_reverse($address));
                        break;
                    case "city":
                        $output = @$ipdat->geoplugin_city;
                        break;
                    case "state":
                        $output = @$ipdat->geoplugin_regionName;
                        break;
                    case "region":
                        $output = @$ipdat->geoplugin_regionName;
                        break;
                    case "country":
                        $output = @$ipdat->geoplugin_countryName;
                        break;
                    case "countrycode":
                        $output = @$ipdat->geoplugin_countryCode;
                        break;
                }
            }
        }
        return $output;
    }

    public function getUserIP()
    {
        // Get real visitor IP behind CloudFlare network
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
            $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
            $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        }
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];

        if (filter_var($client, FILTER_VALIDATE_IP)) {
            $ip = $client;
        } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
            $ip = $forward;
        } else {
            $ip = $remote;
        }

        return $ip;
    }

    public function setupUser()
    {
        // check if user exist in table and redirect to home
        if (User::first()) {
            return Redirect()->route('dashboard');
        } else {
            // show register view
            $currencies = Countries::all();
            return view('auth.register', compact('currencies'));
        }
        return;
    }

    public function register(Request $request)
    {
        return Branch::register($request);
    }

    public function setupApp()
    {
        return view('setup');
    }

    public function saveApp(Request $request)
    {
        return;
    }

    public function uploadLogo(Request $request)
    {
        return Setting::uploadLogo($request);
    }

    public function saveAppName(Request $request)
    {
        return Setting::saveAppName($request);
    }
}
