<?php

namespace App\Http\Controllers\student;

use App\Models\Event;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $events = User::find($id)->events;
        $pages = 'event';
        return view('student.event.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pages = 'event';
        $users = User::all()->where('lecturer_id', '<>', null);
        return view('student.event.addEvent', compact('pages', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $event = Event::create($request->except(['user_id']));
        $event->users()->attach($request->user_id);
        $event->users()->attach(Auth::user()->id);
        return redirect()->route('student.event.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pages = 'event';
        $event = Event::findOrFail($id);

        $events = Event::all()->except($id)->pluck('id');
        // $guestList = User::whereNotIn('id', function($query) use ($events) {
        //     $query->select('user_id')->from('event_user')
        //         ->whereNotIn('event_id', $events);
        // })->where('role_id', 3)->get();

        // return view('creator.event.detail', compact('event', 'guestList'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $pages = 'event';
        $id = $event->event_id;
        $current = Event::find($id)->users->where('lecturer_id', '<>', null)->first();
        $current_id = $current->id;
        $users = User::all()->where('lecturer_id', '<>', null);
        //dd($current);
        return view('student.event.editEvent', ['model' => $event], compact('event', 'pages', 'current_id', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $event->update($request->all());
        return redirect()->route('student.event.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('student.event.index');
    }

    public function approve(Request $request)
    {
        $event = Event::findOrFail($request->id);
        $event->update(['status' => '1']);
        return redirect()->back()->with('Success', 'Event Approved');
    }

    public function reject(Request $request)
    {
        $event = Event::findOrFail($request->id);
        $event->update(['status' => '2']);
        return redirect()->back()->with('Success', 'Event Rejected');
    }

    public function revise(Request $request)
    {
        $event = Event::findOrFail($request->id);
        $event->update(['status' => '3']);
        return redirect()->back()->with('Success', 'Event Needs Revision');
    }
}
