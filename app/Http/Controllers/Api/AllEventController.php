<?php

namespace App\Http\Controllers\Api;

use App\Models\Event;
use App\Http\Resources\Api\EventResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AllEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        return EventResource::collection($events);
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

    public function approve(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        $event->update(['status' => '1']);
        return redirect()->back()->with('Success', 'Event Approved');
    }

    public function reject(Request $request, $id)
    {
        $event = Event::findOrFail($request->id);
        $event->update(['status' => '2']);
        return redirect()->back()->with('Success', 'Event Rejected');
    }

    public function revise(Request $request, $id)
    {
        $event = Event::findOrFail($request->id);
        $event->update(['status' => '3']);
        return redirect()->back()->with('Success', 'Event Needs Revision');
    }

    public function open(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        $event->update(['status' => '4']);
        return redirect()->back()->with('Success', 'Event Opened');
    }

    public function close(Request $request, $id)
    {
        $id = $request->id;
        $event = Event::findOrFail($id);
        $event->update(['status' => '5']);
        return redirect()->back()->with('Success', 'Event Closed');
    }
}
