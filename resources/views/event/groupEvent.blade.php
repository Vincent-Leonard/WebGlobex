@extends('layouts.app')
@section('content')
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col">List Group Events</h1>
        </div>
        <div class="row">
            @if (Auth::user()->isStaff())
                <div>
                    <a href="{{ route('staff.event.index') }}" class="col">My Event List</a>
                    <a href="{{ route('admin.event.index') }}" class="col">All Event List</a>
                    <a href="{{ route('admin.join.index') }}" class="col"><b>Joined Event List</b></a>
                </div>
            @endif
            @if (Auth::user()->isLecturer())
                <div>
                    <a href="{{ route('lecturer.event.index') }}" class="col">My Event List</a>
                    <a href="{{ route('admin.event.index') }}" class="col">All Event List</a>
                    <a href="{{ route('admin.join.index') }}" class="col"><b>Joined Event List</b></a>
                </div>
            @endif
            @if (Auth::user()->isStudent())
                <div>
                    <a href="{{ route('student.event.index') }}" class="col">My Event List</a>
                    <a href="{{ route('admin.event.index') }}" class="col">All Event List</a>
                    <a href="{{ route('admin.join.index') }}" class="col"><b>Joined Event List</b></a>
                </div>
            @endif
        </div>
        <div class="row" style="margin-top: 30px;">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Event</th>
                        <th scope="col">Type</th>
                        <th scope="col">Participation</th>
                        <th scope="col">Date</th>
                        <th scope="col">Current Participants</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($events as $event)
                        <tr>
                            <td><a href="@auth{{ route('admin.join.edit', $event) }}@endauth">{{ $event->event }}</td>
                            @if ($event->type == 0)
                                <td>Student Exchange</td>
                            @else
                                <td>Student Excursion</td>
                            @endif
                            @if ($event->is_group == 0)
                                <td>Individual</td>
                            @else
                                <td>Group</td>
                            @endif
                            <td>{{ $event->event_date }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
