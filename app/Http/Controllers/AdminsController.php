<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Setting;
use Illuminate\Support\Facades\DB;
use App\Admins;
use App\Member;
use Illuminate\Http\Request;

class AdminsController extends Controller
{

    public function isleader()
    {
        // Define the logic to determine if the admin is a leader
        // For example, you might have a column named 'role' in your admins table
        // and check if the role is 'leader'
        return $this->role === 'leader';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \App\User::find(1); // Assuming the default user has ID 1

        // Get the count of members using the Query Builder
        $num_members = DB::table('members')->count();
        $num_teams = DB::table('church_teams')->count();
        $num_meetings = DB::table('meetings')->count();
        $num_announcements = DB::table('announcements')->count();
        $num_leaves = DB::table('leaves')->count();
        $num_leaders = DB::table('admins')->count();
        // Set the total
        $total = ['teams' => $num_teams, 'admins' => $num_leaders, 'leaves' => $num_leaves, 'announcements' => $num_announcements, 'meetings' => $num_meetings, 'members' => $num_members];

        return view('admin.admin.dashboard', compact('total'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admins  $admins
     * @return \Illuminate\Http\Response
     */
    public function show(Admins $admins)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admins  $admins
     * @return \Illuminate\Http\Response
     */


    public function read()

    {

        // Retrieve the currently authenticated user
        $user = Auth::guard('leader')->user();

        // Pass the user's data to the view
        return view('admin.admin.leaderprofile', compact('user'));
    }

    public function team()
    {
        // Retrieve the currently authenticated user
        $leader = Auth::user();

        // Retrieve the team members of the leader's team
        $members = App\Member::where('team', $leader->team)->get();

        // Pass the team members to the view
        return view('admin.admin.managemember', compact('members'));
    }


    public function addmember()
    {
        $user = Auth::guard('leader')->user();

        $team = $user->team;

        //get members in that team
        $members = Member::where('team', $team)
            ->orderBy('id', 'DESC')
            ->get();

        return view('admin.admin.addmember');
    }

    public function user()
    {

        // Pass the team members to the view


        return view('admin.admin.editmember');
    }




    public function edit(Admins $admins)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admins  $admins
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admins $admins)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admins  $admins
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admins $admins)
    {
        //
    }
}
