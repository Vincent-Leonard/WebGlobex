@extends('layouts.app')
@section('content')
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col text-center"><b>Individual Event Lists</b></h1>
        </div>
        <div class="row offset-md11">
            <div>
                <a href="{{ route('admin.event.index') }}" class="col col botn-set-2" style="margin-left: 25px"><b>All Individual</b></a>
                <a href="{{ route('admin.join.index') }}" class="col col botn-set-2">All Group</a>
            </div>
        </div>
        <div class="row">
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for event" style="border: 0; border-radius: 3px">
        </div>
        <div class="row" style="margin-top: 10px; background:rgba(255, 255, 255, 0.8); height: 450px; overflow-y: scroll;">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Event</th>
                        <th scope="col">Type</th>
                        <th scope="col">Participation</th>
                        <th scope="col">Date</th>
                        <th scope="col">Status</th>
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
                            @if ($event->status == 0)
                                <td>Pending</td>
                            @elseif($event->status == 1)
                                <td>Approved</td>
                            @elseif($event->status == 2)
                                <td>Rejected</td>
                            @elseif($event->status == 3)
                                <td>Need Revision</td>
                            @elseif ($event->status == 4)
                                <td>Open</td>
                            @else
                                <td>Close</td>
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
