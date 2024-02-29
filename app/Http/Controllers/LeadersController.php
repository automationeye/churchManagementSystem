<?php

namespace App\Http\Controllers;

use App\Leaders;
use Illuminate\Http\Request;
use Auth;

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

        $leaders = leaders::where('id', '>', 0)->orderBy('id', 'DESC')->get();

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
        //

        $fullName = $request->fullName;
        $phone = $request->phone;
        $team = $request->team;


        $admin = Auth::Guard('admin')->user();

        $admin->branchcode;

        $leaders = new Leaders();

        $leaders->team = $team;
        $leaders->fullName = $fullName;
        $leaders->phone = $phone;

        if ($leaders->save()) {
            return redirect('leaders')->with('success', 'Leader registered successfuly');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Leaders  $leaders
     * @return \Illuminate\Http\Response
     */
    public function edit(Leaders $leaders)
    {
        //
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
    }
}
