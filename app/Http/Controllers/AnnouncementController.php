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
    public function index()
    {
        //


        return view('admin.admin.announcement');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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


        $user=Auth::guard('leader')->user();

       

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

            $team=$user->team;

            $members=Member::where('team',$team)->get('phone');

            $message="Hello newbreed member, $request->details happening on $request->start_date from $request->start_time to $request->stop_date $request->stop_time";
            foreach($members as $member){
                $phones=$member->phone;
                $modifiedNumber = substr($phones, 1);
                sendSmsUsingCurl($modifiedNumber,'20642','plain',$message);
            }

          

            
        

            if($announcement->save()){
                return redirect()->route('announcements')->with('success', 'Announcement created successfully');
            }else{
                return redirect()->route('announcements')->with('error', 'An error occured');
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
    }
}
