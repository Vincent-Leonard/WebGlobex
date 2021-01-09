@extends('layouts.app')
@section('content')
<link type="text/css" href="{{ asset('public/css/style.css') }}" rel="stylesheet">
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col">List Events</h1>
        </div>
        <div class="row">
            @if (Auth::user()->isStaff())
                <div>
                    <a href="{{ route('staff.event.index') }}" class="col">My Event List</a>
                    <a href="{{ route('admin.event.index') }}" class="col"><b>All Event List</b></a>
                    <a href="{{ route('admin.join.index') }}" class="col">Joined Event List</a>
                </div>
            @endif
            @if (Auth::user()->isLecturer())
                <div>
                    <a href="{{ route('lecturer.event.index') }}" class="col">My Event List</a>
                    <a href="{{ route('admin.event.index') }}" class="col"><b>All Event List</b></a>
                    <a href="{{ route('admin.join.index') }}" class="col">Joined Event List</a>
                </div>
            @endif
            @if (Auth::user()->isStudent())
                <div>
                    <a href="{{ route('student.event.index') }}" class="col">My Event List</a>
                    <a href="{{ route('admin.event.index') }}" class="col"><b>All Event List</b></a>
                    <a href="{{ route('admin.join.index') }}" class="col">Joined Event List</a>
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
                        <th scope="col">Status</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                        <th scope="col">Approve</th>
                        <th scope="col">Reject</th>
                        <th scope="col">Revise</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($events as $event)
                        <tr>
                            <td><a href="@auth{{ route('admin.event.show', $event) }}@endauth">{{ $event->event }}</td>
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
                            @if ($event->is_group == 0)
                                @if ($event->status == 0)
                                    <td>Pending</td>
                                    <td>-</td>

                                @elseif($event->status == 1)
                                    <td>Approved</td>
                                    <td>-</td>
                                @elseif($event->status == 2)
                                    <td>Rejected</td>
                                    <td>-</td>
                                @else
                                    <td>Need Revision</td>
                                    <td>-</td>
                                @endif
                            @else
                                <td>-</td>
                                <td>
                                    <form action="{{ route('admin.event.edit', $event) }}" method="GET">
                                        @csrf
                                        <button class="btn btn-primary" type="submit">Edit</button>
                                    </form>
                                </td>
                            @endif
                            <td>
                                <form action="{{ route('admin.event.destroy', $event) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                            @if ($event->status == 0)
                                <td>
                                    <form action="{{ route('admin.event.approve') }}" method="POST">
                                        {{ csrf_field() }}
                                        <input name="id" type="hidden" value="{{ $event->event_id }}">
                                        <button class="btn btn-success btn-circle" title="Approve" type="submit"></button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('admin.event.reject') }}" method="POST">
                                        {{ csrf_field() }}
                                        <input name="id" type="hidden" value="{{ $event->event_id }}">
                                        <button class="btn btn-danger btn-circle" title="Reject" type="submit"></button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('admin.event.revise') }}" method="POST">
                                        {{ csrf_field() }}
                                        <input name="id" type="hidden" value="{{ $event->event_id }}">
                                        <button class="btn btn-warning btn-circle" title="Revise" type="submit"></button>
                                    </form>
                                </td>
                            @else
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
