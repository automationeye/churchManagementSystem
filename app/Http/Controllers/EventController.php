<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Member;
use App\Announcement;
use App\Mail\EventNotice;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \Auth::Guard('admin')->user();
        $pastors = Member::whereIn('position', ['senior pastor', 'pastor'])
            ->where('branch_id', $user->id)->get();
        $events = Event::where('events.branch_id', $user->id)->get();
        return view('events.index', compact('events', 'pastors'));
    }
    //->where('events.assign_to', 'like', '%members.id,%')
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('events.create');
    }

    public function showevents()
    {
        $user = \Auth::Guard('admin')->user();
        $pastors = Member::whereIn('position', ['senior pastor', 'pastor'])
            ->where('branch_id', $user->id)->get();
        $events = Event::where('events.branch_id', $user->id)
            ->orderBy('id', 'DESC')
            ->get();
        return view('events.index', compact('events', 'pastors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|min:0',
            'location' => 'required|string|min:0',
            'time' => 'required|string|min:0',
            
            'date' => 'required|date ',
        ]);

        // Retrieve the 'assign' field as an array and convert it to a comma-separated string
        $assign_to = implode(",", $request->get('assign') ?? []);

        $user = \Auth::Guard('admin')->user();
        // Create a new event instance with the form data
        $event = new Event([
            'title' => $request->get('title'),
            'location' => $request->get('location'),
            'time' => $request->get('time'),
            'assign_to' => null,
            'by_who' => $user->id,
            'details' => $request->get('details'),
            'branch_id' =>$user->id, // Assuming you want to assign the current user's ID to 'branch_id'
            'date' => $request->get('date'), // Laravel will automatically convert this to a valid date format
        ]);

        // Save the event to the database
        $event->save();

        // // Send email notifications to assigned users
        // foreach ($request->assign ?? [] as $to) {
        //     \Mail::to($to)->send(new EventNotice($request)); // Assuming you have defined 'EventNotice' mail class
        // }

        // Redirect back with success message
        return redirect()->route('events.all')->with('status', 'Event successfully saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $event = Event::find($id);
        $event->delete();
        return redirect()->back()->with('status', 'Event Successfully Deleted');
    }

    public function news()
    {
        $user = \Auth::user();
        //$contact =  \App\User::get();

        $contact =  \App\User::where('id', '!=', $user->id)->get();
        return view('notification.index', compact('contact'));
    }



    public function add(Request $request)
    {
        $this->validate($request, [
            'message' => 'required|string|min:0',
            'by_who'  => 'required|string|min:0',
            'date'    => 'required|date ',
        ]);

        $today = Carbon::now()->toDateString();
        $split_sdate_array = explode("-", date('Y-m-d', strtotime($request->get('sdate'))));
        $split_date_array = explode("-", date('Y-m-d', strtotime($request->get('date'))));
        if (Carbon::createFromDate($split_sdate_array[0], $split_sdate_array[1], $split_sdate_array[2]) < $today || Carbon::createFromDate($split_date_array[0], $split_date_array[1], $split_date_array[2]) < Carbon::createFromDate($split_sdate_array[0], $split_sdate_array[1], $split_sdate_array[2])) {
            //if($request->get('sdate') < $today) {
            $request->session()->flash('message', 'Announcement Not saved Only Future Date Allowed!');
            $request->session()->flash('alert-class', 'alert-danger');
            //echo $request->get('sdate') . '  ' .$today .'            '. print_r($split_sdate_array) . '         ' . print_r($split_date_array) . ' carb ' . Carbon::createFromDate($split_sdate_array[0], $split_sdate_array[1], $split_sdate_array[2]) . ' carb end '. Carbon::createFromDate($split_date_array[0], $split_date_array[1], $split_date_array[2]);
            return redirect()->route('notification');
        } else {
            // foreach ($request->to as $to)
            // {
            // $id = $to;
            // convert date to acceptable mysql format
            $sdate = date('Y-m-d', strtotime($request->get('sdate')));
            $date = date('Y-m-d', strtotime($request->get('date')));
            $announcement = Announcement::create([
                'branch_id'  => auth()->user()->id,
                'details'    => $request->get('message'),
                'by_who'     => $request->get('by_who'),
                'start_date' => $date,
                'stop_date'  => $sdate,
                'start_time' => $request->get('time'),
                'stop_time'  => $request->get('stime'),
            ]);
        }
        $request->session()->flash('message', 'Announcement successfully saved!');
        $request->session()->flash('alert-class', 'alert-success');
        return redirect()->route('notification');
        // }

    }
}
