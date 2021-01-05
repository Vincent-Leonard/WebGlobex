<?php

namespace App\Http\Controllers\student;

use App\Models\Event;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $events = Event::all()->where('is_group', 1);
        $pages = 'event';
        return view('student.event.joinEvent', compact('events'));
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
        return view('student.event.addGroupEvent', compact('pages', 'users'));
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
        return redirect()->route('student.event.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
        // dd($event);
        return redirect()->back()->with('Success');
    }
}
