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
                    <a href="{{ route('admin.join.index') }}" class="col"><b>Paricipant List</b></a>
                </div>
            @endif
            @if (Auth::user()->isLecturer())
                <div>
                    <a href="{{ route('lecturer.event.index') }}" class="col">My Event List</a>
                    <a href="{{ route('admin.event.index') }}" class="col">All Event List</a>
                    <a href="{{ route('admin.join.index') }}" class="col"><b>Paricipant List</b></a>
                </div>
            @endif
            @if (Auth::user()->isStudent())
                <div>
                    <a href="{{ route('student.event.index') }}" class="col">My Event List</a>
                    <a href="{{ route('admin.event.index') }}" class="col">All Event List</a>
                    <a href="{{ route('admin.join.index') }}" class="col"><b>Paricipant List</b></a>
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
                        <th scope="col">Status</th>
                        <th scope="col">Paritcipants</th>
                        <th scope="col">Action</th>
                        <th scope="col">Edit</th>
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
                            <td>{{ $event->event_date }}</td>
                            @if ($event->status == 4)
                                <td>Open</td>
                            @else
                                <td>Close</td>
                            @endif
                            <td>
                                <form action="{{ route('admin.join.edit', $event) }}" method="GET">
                                    @csrf
                                    <button class="btn btn-primary" type="submit">Details</button>
                                </form>
                            </td>
                            @if($event->status == 5)
                            <td>
                                <form action="{{ route('admin.event.open') }}" method="POST">
                                    {{ csrf_field() }}
                                    <input name="id" type="hidden" value="{{ $event->event_id }}">
                                    <button class="btn btn-primary btn-circle" title="Open" type="submit">Open</button>
                                </form>
                            </td>
                            @elseif($event->status == 4)
                            <td>
                                <form action="{{ route('admin.event.close') }}" method="POST">
                                    {{ csrf_field() }}
                                    <input name="id" type="hidden" value="{{ $event->event_id }}">
                                    <button class="btn btn-danger btn-circle" title="Close" type="submit">Close</button>
                                </form>
                            </td>
                            @endif
                            <td>
                                <form action="{{ route('admin.event.edit', $event) }}" method="GET">
                                    @csrf
                                    <button class="btn btn-primary" type="submit">Edit</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
