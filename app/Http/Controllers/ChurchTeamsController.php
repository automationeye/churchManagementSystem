<?php

namespace App\Http\Controllers;

use App\ChurchTeams;
use Illuminate\Http\Request;
use Auth;

class ChurchTeamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $teams = ChurchTeams::where('id', '>', 0)->orderBy('id', 'ASC')->get();

        return view('teams.index')->with(compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        //
        return view('teams.create');
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
        $team = $request->team;
        $leader = $request->leader;

        $admin = Auth::Guard('admin')->user();

        $branch_id = $admin->branchcode;

        $status = 1;

        $churchTeams = new ChurchTeams();

        $churchTeams->team = $team;
        $churchTeams->leader = $leader;
        $churchTeams->branch = $branch_id;

        if ($churchTeams->save()) {
            return redirect('teams')->with('success', 'Team created successfuly');
        } else {
            return redirect('teams.create')->with('error', 'Team not created');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ChurchTeams  $churchTeams
     * @return \Illuminate\Http\Response
     */
    public function show(ChurchTeams $churchTeams)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ChurchTeams  $churchTeams
     * @return \Illuminate\Http\Response
     */
    public function edit(ChurchTeams $churchTeams)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ChurchTeams  $churchTeams
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ChurchTeams $churchTeams)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ChurchTeams  $churchTeams
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChurchTeams $churchTeams)
    {
        //
    }
}
