@extends('layouts.app')
@section('content')

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../../../public/css/style.css" />
    </head>
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col text-center">My Events</h1>
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
        <div class="row" style="margin-top: 30px; width:60%; float:left; margin-left: -5px;">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Event</th>
                        <th scope="col">Type</th>
                        <th scope="col">Participation</th>
                        <th scope="col">Date</th>
                        <th scope="col">Status</th>
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
                                @elseif($event->status == 1)
                                    <td>Approved</td>
                                @elseif($event->status == 2)
                                    <td>Rejected</td>
                                @else
                                    <td>Need Revision</td>
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
        <div class="detailfolder" style="width: 30%; float:left; margin-left: 100px; margin-top: 30px;">
                <div class="form-event">
                    <label>Name :</label>
                    <input type="text" class="form-control" name="name" onmouseover="this.style.boxShadow='0px 0px 15px LightSkyBlue'" onmouseout="this.style.boxShadow='0px 0px 0px LightSkyBlue'">
                </div>
                <div class="form-event">
                    <label>Type :</label>
                    <input type="text" class="form-control" name="type" onmouseover="this.style.boxShadow='0px 0px 15px LightSkyBlue'" onmouseout="this.style.boxShadow='0px 0px 0px LightSkyBlue'">
                </div>
                <div class="form-event">
                    <label>Date :</label>
                    <input type="text" class="form-control" name="Date" onmouseover="this.style.boxShadow='0px 0px 15px LightSkyBlue'" onmouseout="this.style.boxShadow='0px 0px 0px LightSkyBlue'">
                </div>
                <div class="form-event">
                    <label>Duration :</label>
                    <input type="text" class="form-control" name="duration" onmouseover="this.style.boxShadow='0px 0px 15px LightSkyBlue'" onmouseout="this.style.boxShadow='0px 0px 0px LightSkyBlue'">
                </div>
                <div class="form-event">
                    <label>City :</label>
                    <input type="text" class="form-control" name="city" onmouseover="this.style.boxShadow='0px 0px 15px LightSkyBlue'" onmouseout="this.style.boxShadow='0px 0px 0px LightSkyBlue'">
                </div>
                <div class="form-event">
                    <label>Orginizer :</label>
                    <input type="text" class="form-control" name="orginizer" onmouseover="this.style.boxShadow='0px 0px 15px LightSkyBlue'" onmouseout="this.style.boxShadow='0px 0px 0px LightSkyBlue'">
                </div>
        </div>
    </div>
@endsection
