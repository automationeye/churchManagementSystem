<?php

namespace App\Http\Controllers;

use App\Announcement;
use App\Member;
use Auth;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function admincreate()
    {
        return view('announcements.create');
    }

    public function adminview()
    {
        return view('announcements.index');
    }


    public function index()
    {
        // Fetch announcement data from the database
        $announcements = Announcement::where('id', '>', 0)->orderBy('id', 'ASC')->get();
        // dd($announcements);

        // Pass the data to the view
        return view('announcements.index', compact('announcements'));
    }





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('announcements.create');
    }

    public function save(Request $request)
    {
        $title = $request->input('title'); // accessing 'title' field from the form
        $leader = $request->input('leader'); // accessing 'leader' field from the form

        // Retrieve the authenticated admin
        $admin = Auth::guard('admin')->user();

        // Get the branch code of the authenticated admin
        $branch_id = $admin->branchcode;

        // Set the status
        $status = 1;

        // Create a new Announcement instance
        $announcement = new Announcement();

        // Set the attributes of the Announcement instance
        $announcement->details = $title;
        $announcement->by_who = $leader;
        $announcement->branch_id = $branch_id;


        // Save the Announcement instance
        if ($announcement->save()) {
            return redirect()->route('announcements.form', ['id' => $announcement->id])->with('success', 'Announcement created successfully');
        } else {
            return redirect('announcements/create')->with('error', 'Announcement not created');
        }
    }









    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        //dd($request->all());


        $user = Auth::guard('leader')->user();



        $validatedData = $request->validate([
            'details' => 'required|string|max:255',
            'by_who' => 'required|string|max:255',
            'start_date' => 'required',
            'stop_date' => 'required',
            'start_time' => 'required',
            'stop_time' =>  'required',

        ]);

        try {
            // Create a new instance of the Meeting model

            $announcement = new Announcement();

            // Assign values to the model attributes
            $announcement->details = $request->details;
            $announcement->by_who = $request->by_who;
            $announcement->start_date = $request->start_date;
            $announcement->stop_date = $request->stop_date;
            $announcement->start_time = $request->start_time;
            $announcement->stop_time = $request->stop_time;


            //fetch members of that team

            $team = $user->team;

            $members = Member::where('team', $team)->get('phone');

            $message = "Hello newbreed member\n, $request->details happening on $request->start_date from $request->start_time to $request->stop_date $request->stop_time\n";
            foreach ($members as $member) {
                $phones = $member->phone;
                $modifiedNumber = substr($phones, 1);
                sendSmsUsingCurl($modifiedNumber, '20642', 'plain', $message);
            }






            if ($announcement->save()) {
                return redirect()->back()->with('success', 'Announcement created successfully');
            } else {
                return redirect()->back()->with('error', 'An error occured');
            }

            // Save the Announcement data into the database


            // Optionally, you can redirect the user to a success page or return a success response

        } catch (\Exception $e) {
            // Handle any exceptions that occur during the database operation
            // You can log the error, display a user-friendly message, or redirect the user to an error page
            return back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */


    public function displayAnnouncements()
    {
        // Get all announcements
        $announcements = Announcement::all();

        // Filter announcements posted by the bishop
        $bishopAnnouncements = $announcements->where('by_who', 'Bishop');

        // Pass the filtered announcements to the view
        // return view('members.member', [
        //     'bishopAnnouncements' => $bishopAnnouncements,
        // ]);
    }

    public function show(Announcement $announcement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function edit(Announcement $announcement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Announcement $announcement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announcement $announcement)
    {
        //

        $announcement->delete();

        // Redirect back to the members list or any other appropriate page
        return redirect('editannouncement')->with('success', 'Announcement deleted');
    }

    public function admindestroy(Announcement $announcement)
    {
        //

        $announcement->delete();

        // Redirect back to the members list or any other appropriate page
        return redirect()->back()->with('success', 'Announcement deleted successfully');
    }
}
