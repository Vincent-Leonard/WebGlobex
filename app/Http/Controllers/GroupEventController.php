<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;

class GroupEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all()->where('is_group', 1);
        $pages = 'index';
        return view('event.groupEvent', compact('events', 'pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('event.addGroupEvent');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'file' => 'image',
        ]);

        if ($request->has('file')) {
            $file_name = time() . '-' . $data['file']->getClientOriginalName();
            $request->file->move(public_path('images\event\group'), $file_name);
        } else {
            $file_name = null;
        }

        Event::create([
            'event' => $request->event,
            'type' => $request->type,
            'is_group' => $request->is_group,
            'event_date' => $request->event_date,
            'duration' => $request->duration,
            'country' => $request->country,
            'city' => $request->city,
            'organizer' => $request->organizer,
            'file' => $file_name,
            'status' => '4',
        ]);

        return redirect()->route('admin.group.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show($detail)
    {
        $events = Event::all()->where('is_group', 1);
        $pages = 'showit';
        $return = Event::Find($detail);
        return view('event.groupEvent', compact('events', 'return', 'pages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::Find($id);
        return view('event.editGroupEvent', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $event = Event::Find($id);
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

        return redirect()->route('admin.group.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::Find($id);
        $event->users()->detach();
        $event->delete();
        return redirect()->back()->with('Success', 'Event Deleted');
    }

    public function open(Request $request)
    {
        $event = Event::findOrFail($request->id);
        $event->update(['status' => '4']);
        return redirect()->back()->with('Success', 'Event Opened');
    }

    public function close(Request $request)
    {
        $event = Event::findOrFail($request->id);
        $event->update(['status' => '5']);
        return redirect()->back()->with('Success', 'Event Closed');
    }
}
