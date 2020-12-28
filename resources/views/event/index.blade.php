@extends('layouts.app')
@section('content')

        <div class="container" style="margin-top: 20px;">
            <div class="row">
                <h1 class="col">List Event</h1>
            </div>
            <div class="row">
                {{-- @auth --}}
                <div class="col-md-2 offset-md-10">
                    <a href="{{route('event.create')}}" class="btn btn-primary btn-block" role="button" aria-pressed="true">Tambah</a>
                </div>
                {{-- @endauth --}}
            </div>
            <div class="row" style="margin-top: 30px;">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Event</th>
                            <th scope="col">Type</th>
                            <th scope="col">Date</th>
                            <th scope="col">Status</th>
                            <th scope="col">Detail</th>
                            <th scope="col">Approve</th>
                            <th scope="col">Reject</th>
                            <th scope="col">Revise</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($events as $event)
                            <tr>
                                <td><a href="@auth{{route('event.show', $event)}}@endauth">{{$event->event}}</td>
                                @if($event->type == 0)
                                    <td>Student Exchange</td>
                                @else
                                    <td>Student Excursion</td>
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
                                @auth
                                <td>
                                    <form action="{{ route('event.edit', $event) }}" method="GET">
                                        @csrf
                                        <button class="btn btn-primary" type="submit">Edit</button>
                                    </form>
                                </td>
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
                                @endauth
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
@endsection
