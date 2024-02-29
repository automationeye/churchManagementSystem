<?php

namespace App\Http\Controllers;

use App\ChurchTeams;
use Illuminate\Http\Request;

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
