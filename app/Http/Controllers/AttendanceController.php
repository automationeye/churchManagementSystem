<?php

namespace App\Http\Controllers;

use App\Attendance;
use Auth;
use Illuminate\Http\Request;


class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // Retrieve the currently authenticated user
       $user = Auth::user();
          // Pass the user's data to the view
          return view('members.member', compact('user'));
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
        // Store attendance record in the database
        Attendance::create([
            
            'id' => $request->user_id,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'checkIn' => now(), // Store the current time as check-in time
            'checkOut' => now(), // Store the current time as check-in time
        ]);

        return view('members.member', compact('user'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $attendance)
    {
        //
    }


    public function analysis()
    {
    }
    //form view
    public function view()
    {
    }

    public function mark()
    {
    }

    public function mark_it(Request $request)
    {
    }

    public function attendanceStats(Request $request)
    {
    }
}
