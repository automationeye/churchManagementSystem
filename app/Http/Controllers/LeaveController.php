<?php

namespace App\Http\Controllers;

use Auth;
use App\Leave;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {



        return view('members.requestleave');
    }

    // Define the accept method to handle leave acceptance
    public function accept($id)
    {
        // Find the leave request by its ID
        $leave = Leave::findOrFail($id);

        // Update the status to indicate acceptance (assuming you have a status column)
        $leave->update(['status' => 1]);

        // Redirect back or to a specific route
        return redirect()->back()->with('success', 'Leave request accepted successfully.');
    }

    // Define the reject method to handle leave rejection
    public function reject($id)
    {
        // Find the leave request by its ID
        $leave = Leave::findOrFail($id);

        // Update the status to indicate rejection (assuming you have a status column)
        $leave->update(['status' => 2]);

        // Redirect back or to a specific route
        return redirect()->back()->with('success', 'Leave request rejected successfully.');
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


    // public function memberleave()
    // {
    //     return view('admin.admin.memberleave');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //


        $leaverequest = new Leave();


        $leaverequest->user_id = Auth::user()->id;
        $leaverequest->firstname = Auth::user()->firstname;
        $leaverequest->lastname = Auth::user()->lastname;

        $leaverequest->from = $request->fromDate;
        $leaverequest->to = $request->toDate;
        $leaverequest->reason = $request->reason;
        $leaverequest->status = 0;

        try {
            $leaverequest->save();

            if ($leaverequest) {
                return redirect('memberdash')->with('success', 'Leave successfuly created, await message from admin!');
            } else {
                return redirect('memberdash')->back()->with('error', 'An error occured!');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function show(Leave $leave)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function edit(Leave $leave)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Leave $leave)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function destroy(Leave $leave)
    {
        //
    }
}
