<?php

namespace App\Http\Controllers;

use App\Meeting;
use Illuminate\Http\Request;

class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //


        return view('admin.admin.meeting');
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
        // dd($request->all());
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'venue' => 'required|string|max:255',
            'datetime' => 'required|date_format:Y-m-d\TH:i', // Assuming datetime format is like "YYYY-MM-DDTHH:MM"
        ]);

        try {
            // Create a new instance of the Meeting model
            $meeting = new Meeting();

            // Assign values to the model attributes
            $meeting->title = $request->title;
            $meeting->description = $request->description;
            $meeting->venue = $request->venue;
            $meeting->datetime = $request->datetime;

            // Save the meeting data into the database
            $meeting->save();

            // Optionally, you can redirect the user to a success page or return a success response
            return redirect()->route('meetings.index')->with('success', 'Meeting created successfully');
        } catch (\Exception $e) {
            // Handle any exceptions that occur during the database operation
            // You can log the error, display a user-friendly message, or redirect the user to an error page
            return back()->withInput()->withErrors(['error' => 'An error occurred while creating the meeting']);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function show(Meeting $meeting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function edit(Meeting $meeting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meeting $meeting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meeting $meeting)
    {
        //
    }
}
