<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApproveJoinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all()->where('is_group', 1);
        $pages = 'join';
        return view('event.groupEvent', compact('events'));
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $pages = 'event';
        // $id = $event->event_id;
        // $current = Event::find($id)->users->where('lecturer_id', '<>', null)->first();
        // $current_id = $current->id;
        // $users = User::all()->where('lecturer_id', '<>', null);
        $events = Event::find($id);
        // dd($users);
        return view('event.listParticipant', compact('events'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function acceptStudent($id, Request $request)
    {
        $user = User::findOrFail($id);
        $event = $user->attends->where('event_id', '=', $request->event_id)->first();
        $event->pivot->update([
            'is_approved' => '1',
        ]);
        return redirect()->back()->with('Success', 'Event Approved');
    }

    public function rejectStudent($id, Request $request)
    {
        $user = User::findOrFail($id);
        $event = $user->attends->where('event_id', '=', $request->event_id)->first();
        // dd($event);
        $event->pivot->update([
            'is_approved' => '2',
        ]);
        return redirect()->back()->with('Success', 'Event Rejected');
    }
}
