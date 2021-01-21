<?php

namespace App\Http\Controllers\lecturer;

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
        $events = User::find($id)->attends;
        $pages = 'index';
        return view('lecturer.event.index', compact('events', 'pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all()->where('lecturer_id', '<>', null);
        return view('lecturer.event.addEvent', compact('users'));
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
            $request->file->move(public_path('images\event\individual'), $file_name);
        } else {
            $file_name = null;
        }

        $event = Event::create([
            'event' => $request->event,
            'type' => $request->type,
            'is_group' => $request->is_group,
            'event_date' => $request->event_date,
            'duration' => $request->duration,
            'country' => $request->country,
            'city' => $request->city,
            'organizer' => $request->organizer,
            'file' => $file_name,
        ]);

        $event->users()->attach($request->user_id);
        $event->users()->attach(Auth::user()->id);
        return redirect()->route('lecturer.event.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show($detail)
    {
        $id = Auth::user()->id;
        $events = User::find($id)->attends;
        $pages = 'showit';
        $return = Event::Find($detail);
        return view('lecturer.event.index', compact('events', 'return', 'pages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit($detail)
    {
        $event = Event::Find($detail);
        $current = $event->users->where('lecturer_id', '<>', null)->first();
        $current_id = $current->id;
        $users = User::all()->where('lecturer_id', '<>', null);
        return view('lecturer.event.editEvent', compact('event', 'current_id', 'users'));
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
            'status' => '0',
        ]);

        if ($request->file != null) {
            $data = $request->validate([
                'file' => 'image',
            ]);
            if ($request->has('file')) {
                $file_name = time() . '-' . $data['file']->getClientOriginalName();
                $request->file->move(public_path('images\event\individual'), $file_name);
                $event->update([
                    'file' => $file_name
                ]);
            }
        }

        $current_lecturer = Event::find($event->event_id)->users->where('lecturer_id', '<>', null)->first();
        $event->users()->where('user_id', $current_lecturer->id)->update([
            'user_id' => $request->user_id
        ]);

        return redirect()->route('lecturer.event.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->users()->detach();
        $event->delete();
        return redirect()->route('lecturer.event.index');
    }
}
