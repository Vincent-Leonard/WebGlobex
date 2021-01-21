<?php

namespace App\Http\Controllers\lecturer;

use App\Models\Event;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JoinEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $users = Auth::user()->events->where('is_group', 1)->pluck('event_id');
        $eventsAll = Event::select('*')->from('events')->whereNotIn('event_id', $users)->get();
        $events = $eventsAll->where('is_group', 1);
        $pages = 'index';
        return view('lecturer.event.joinEvent', compact('events', 'pages'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = Auth::user()->id;
        $users = Auth::user()->events->where('is_group', 1)->pluck('event_id');
        $eventsAll = Event::select('*')->from('events')->whereNotIn('event_id', $users)->get();
        $events = $eventsAll->where('is_group', 1);
        $pages = 'showit';
        $return = Event::Find($id);
        return view('lecturer.event.joinEvent', compact('events', 'return', 'pages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function join(Request $request)
    {
        $event = Event::findOrFail($request->id);
        $event->users()->attach(Auth::user()->id);
        return redirect()->back()->with('Success');
    }
}
