<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        $pages = 'event';
        return view('event.index', compact('events'));
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
        $users = User::all();
        return view('event.editEvent', ['model' => $event], compact('event', 'pages'));
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
        $event->update([
            'event' => $request->event,
            'type' => $request->type,
            'event_date' => $request->event_date,
            'duration' => $request->duration,
            'country' => $request->country,
            'city' => $request->city,
            'organizer' => $request->organizer,
        ]);

        if ($request->file != null) {
            $data = $request->validate([
                'file' => 'image',
            ]);
            if ($request->has('file')) {
                $file_name = time() . '-' . $data['file']->getClientOriginalName();
                $request->file->move(public_path('images\event\group'), $file_name);
                $event->update([
                    'file' => $file_name
                ]);
            }
        }

        return redirect()->route('admin.event.index');
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
        return redirect()->route('admin.event.index');
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
