@extends('layouts.app')
@section('content')

        <div class="container" style="margin-top: 20px;">
            <div class="row">
                <h1 class="col">List Event</h1>
            </div>
            <div class="row">
                <div class="col-md-3 offset-md-12">
                    <a href="{{route('student.event.create')}}" class="btn btn-primary btn-block" role="button" aria-pressed="true">Create Individual Event</a>
                </div>
                <div class="col-md-2 offset-md-12">
                    <a href="{{route('student.admin.create')}}" class="btn btn-primary btn-block" role="button" aria-pressed="true">Create Group Event</a>
                </div>
                <div class="col-md-2 offset-md-12">
                    <a href="{{route('student.admin.index')}}" class="btn btn-primary btn-block" role="button" aria-pressed="true">Join Group Event</a>
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
                            <th scope="col">Detail</th>
                            @if (Auth::user()->isAdmin())
                            <th scope="col">Approve</th>
                            <th scope="col">Reject</th>
                            <th scope="col">Revise</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($events as $event)
                            <tr>
                                <td><a href="@auth{{route('admin.event.show', $event)}}@endauth">{{$event->event}}</td>
                                @if($event->type == 0)
                                    <td>Student Exchange</td>
                                @else
                                    <td>Student Excursion</td>
                                @endif
                                @if($event->is_group == 0)
                                    <td>Individual</td>
                                @else
                                    <td>Group</td>
                                @endif
                                <td>{{$event->event_date}}</td>
                                @if($event->status == 0)
                                    <td>Pending</td>
                                @elseif($event->status == 1)
                                    <td>Approved</td>
                                @elseif($event->status == 2)
                                    <td>Rejected</td>
                                @else
                                    <td>Need Revision</td>
                                @endif
                                @if($event->status == 0)
                                    @if($event->is_group == 0)
                                    <td>
                                        <form action="{{ route('student.event.edit', $event) }}" method="GET">
                                            @csrf
                                            <button class="btn btn-primary" type="submit">Edit</button>
                                        </form>
                                    </td>
                                    @elseif($event->is_group == 1)
                                        @if(Auth::user()->isAdmin())
                                        <td>
                                            <form action="{{ route('student.event.edit', $event) }}" method="GET">
                                                @csrf
                                                <button class="btn btn-primary" type="submit">Edit</button>
                                            </form>
                                        </td>
                                        @endif
                                    @endif
                                @endif
                                @if (Auth::user()->isAdmin())
                                <td>
                                    <form action="{{route('event.approve')}}" method="POST">
                                        {{ csrf_field() }}
                                        <input name="id" type="hidden" value="{{$event->event_id}}">
                                        <button class="btn btn-success btn-circle" title="Approve" type="submit"></button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{route('event.reject')}}" method="POST">
                                        {{ csrf_field() }}
                                        <input name="id" type="hidden" value="{{$event->event_id}}">
                                        <button class="btn btn-danger btn-circle" title="Reject" type="submit"></button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{route('event.revise')}}" method="POST">
                                        {{ csrf_field() }}
                                        <input name="id" type="hidden" value="{{$event->event_id}}">
                                        <button class="btn btn-warning btn-circle" title="Revise" type="submit"></button>
                                    </form>
                                </td>
                                @endif
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
@endsection
