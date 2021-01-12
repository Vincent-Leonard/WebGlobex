@extends('layouts.app')
@section('content')

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../../../public/css/style.css" />
    </head>
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col">My Events</h1>
        </div>
        <div class="row">
            @if (Auth::user()->isAdmin())
                <div>
                    <a href="{{ route('student.event.index') }}" class="col"><b>My Event List</b></a>
                    <a href="{{ route('admin.event.index') }}" class="col">All Event List</a>
                    <a href="{{ route('admin.join.index') }}" class="col">Paricipant List</a>
                </div>
            @endif

            <div class="col-md-3 offset-md-1">
                <a href="{{ route('student.event.create') }}" class="btn btn-primary btn-block" role="button"
                    aria-pressed="true">Create Individual Event</a>
            </div>
            @if (Auth::user()->isAdmin())
                <div class="col-md-2 offset-md-0">
                    <a href="{{ route('student.group.create') }}" class="btn btn-primary btn-block" role="button"
                        aria-pressed="true">Create Group Event</a>
                </div>
            @endif
            <div class="col-md-2 offset-md-0">
                <a href="{{ route('student.group.index') }}" class="btn btn-primary btn-block" role="button"
                    aria-pressed="true">Join Group Event</a>
            </div>
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
                                    <td>
                                        <form action="{{ route('student.event.edit', $event) }}" method="GET">
                                            @csrf
                                            <button class="btn btn-primary" type="submit">Edit</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{ route('student.event.destroy', $event) }}" method="post">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                @elseif($event->status == 1)
                                    <td>Approved</td>
                                    <td>
                                        <form action="{{ route('student.event.edit', $event) }}" method="GET">
                                            @csrf
                                            <button class="btn btn-primary" type="submit">Re-Submit</button>
                                        </form>
                                    </td>
                                    <td>-</td>
                                @elseif($event->status == 2)
                                    <td>Rejected</td>
                                    <td>-</td>
                                    <td>-</td>
                                @else
                                    <td>Need Revision</td>
                                    <td>
                                        <form action="{{ route('student.event.edit', $event) }}" method="GET">
                                            @csrf
                                            <button class="btn btn-primary" type="submit">Edit</button>
                                        </form>
                                    </td>
                                    <td>-</td>
                                @endif
                            @else
                                <td>
                                    @if ($event->pivot->is_approved == 0)
                                        Pending
                                    @elseif ($event->pivot->is_approved == 1)
                                        Approved
                                    @elseif ($event->pivot->is_approved == 2)
                                        Rejected
                                    @endif
                                </td>
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
