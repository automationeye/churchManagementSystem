<?php

namespace App\Http\Controllers;

use App\GeneralAttendances;
use Illuminate\Http\Request;

class GeneralAttendancesController extends Controller
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

        $generalAttendances = new GeneralAttendances();
        $generalAttendances->eventormeetingid = $request->meeting_id;
        $generalAttendances->user_id = $request->user_id;
        $generalAttendances->type = $request->type;
        $generalAttendances->lat = $request->latitude;
        $generalAttendances->long = $request->longitude;
        $generalAttendances->save();
        return response()->json([
            'message' => 'Checkin Success',
            'data' => $generalAttendances
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GeneralAttendances  $generalAttendances
     * @return \Illuminate\Http\Response
     */
    public function show(GeneralAttendances $generalAttendances)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GeneralAttendances  $generalAttendances
     * @return \Illuminate\Http\Response
     */
    public function edit(GeneralAttendances $generalAttendances)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GeneralAttendances  $generalAttendances
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GeneralAttendances $generalAttendances)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GeneralAttendances  $generalAttendances
     * @return \Illuminate\Http\Response
     */
    public function destroy(GeneralAttendances $generalAttendances)
    {
        //
    }
}
