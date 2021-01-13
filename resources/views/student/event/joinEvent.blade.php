@extends('layouts.app')
@section('content')

        <div class="container" style="margin-top: 20px;">
            <div class="row">
                <h1 class="col">List Join Events</h1>
            </div>
            <div class="row">
                @if (Auth::user()->isAdmin())
                    <div>
                        <a href="{{ route('student.event.index') }}" class="col">My Event List</a>
                        <a href="{{ route('admin.event.index') }}" class="col">All Event List</a>
                        <a href="{{ route('admin.join.index') }}" class="col">Paricipant List</a>
                    </div>
                @endif
            </div>
            <div class="row" style="margin-top: 30px;">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Event</th>
                            <th scope="col">Type</th>
                            <th scope="col">Date</th>
                            <th scope="col">Join</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($events as $event)
                            <tr>
                                <td><a href="@auth{{route('student.event.show', $event)}}@endauth">{{$event->event}}</td>
                                @if($event->type == 0)
                                    <td>Student Exchange</td>
                                @else
                                    <td>Student Excursion</td>
                                @endif
                                <td>{{$event->event_date}}</td>
                                @if($event->status == 4)
                                <td>
                                    <form action="{{ route('student.group.join') }}" method="POST">
                                        @csrf
                                        <input name="id" type="hidden" value="{{$event->event_id}}">
                                        <button class="btn btn-primary" type="submit">Join</button>
                                    </form>
                                </td>
                                @elseif($event->status == 5)
                                <td>Event Closed</td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
@endsection
