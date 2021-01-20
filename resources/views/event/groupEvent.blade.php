@extends('layouts.app')
@section('content')
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col text-center"><b>Group Event Lists</b></h1>
        </div>
        <div class="row offset-md11">
            <div>
                <a href="{{ route('admin.event.index') }}" class="col col botn-set-2" style="margin-left: 25px">All Individual</a>
                <a href="{{ route('admin.join.index') }}" class="col col botn-set-2"><b>All Group</b></a>
            </div>
        </div>
        <div class="col-md-3 offset-md-10">
            <a href="{{ route('student.group.create') }}" class="btn btn-primary" role="button"
                aria-pressed="true">Create Event Group</a>
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
                        <th scope="col">Date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Paritcipants</th>
                        <th scope="col">Action</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
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
                                    <button class="btn btn-normal btn-circle" title="Open" type="submit">Open</button>
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
                            <td>
                                <form action="{{ route('admin.event.destroy', $event) }}" method="GET">
                                    @csrf
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
