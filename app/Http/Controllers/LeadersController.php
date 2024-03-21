<?php

namespace App\Http\Controllers;

use App\Leaders;
use Illuminate\Http\Request;
use Auth;
use Hash;
use App\Member;

class LeadersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $leaders = leaders::where('id', '>', 0)->orderBy('id', 'ASC')->get();

        return view('leaders.index')->with(compact('leaders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('leaders.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //this is the leaders id so we fetch data about the member and promote the leader

        $leaderid = $request->memberId;
        $leaderDetails = Member::where('id', $leaderid)->first();
        $phone = $leaderDetails->phone;
        $team = $leaderDetails->team;
        $fullName = $leaderDetails->firstname . ' ' . $leaderDetails->lastname;
        $admin = Auth::Guard('admin')->user();
        $admin->branchcode;
        $leaders = new Leaders();
        $leaders->team = $team;
        $leaders->fullName = $fullName;
        $leaders->phone = $phone;
        $leaders->password = $leaderDetails->password;

        if ($leaders->save()) {
            return redirect('leaders/register')->with('success', 'Leader registered successfuly');
        } else {
            return redirect('leaders.register')->with('error', 'Leader not registered');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Leaders  $leaders
     * @return \Illuminate\Http\Response
     */
    public function show(Leaders $leaders)
    {
        //
    }

    public function showLeadersCount()
    {
        $leadersCount = Leaders::count();
        return view('dashboard/index')->with('leadersCount', $leadersCount);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Leaders  $leaders
     * @return \Illuminate\Http\Response
     */
    public function edit(Leaders $leaders)
    {
        //

        return view('leaders.edit', compact('leaders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Leaders  $leaders
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Leaders $leaders)
    {
        //
        // Validate the incoming request data
        $validatedData = $request->validate([
            'fullName' => 'required|string|max:255',

            'phone' => 'required|string|max:255',
            'team' => 'required|string|max:255',
            // Add validation rules for other member details if needed
        ]);

        // Update the member's details
        $leaders->update($validatedData);

        // Redirect the user back with a success message
        return redirect()->route('leaders.index')->with('status', 'Leader details updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Leaders  $leaders
     * @return \Illuminate\Http\Response
     */
    public function destroy(Leaders $leaders)
    {
        //

        $leaders->delete();

        // Redirect back to the leaders list or any other appropriate page
        return redirect()->route('leaders.index')->with('success', 'Leader deleted successfully');
    }
}
