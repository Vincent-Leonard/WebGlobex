@extends('layouts.app')
@section('content')
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col">List Participants</h1>
        </div>
        <div class="row" style="margin-top: 30px;">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">User ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">Accept</th>
                        <th scope="col">Reject</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($events->guests->where('student_id', '<>', null) as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->student->student_name }}</td>
                            @if ($user->pivot->is_approved == 0)
                                <td>Pending</td>
                                <td>
                                    <form action="{{ route('admin.event.acceptStudent', $user->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        <input name="event_id" type="hidden" value="{{ $events->event_id }}">
                                        <button class="btn btn-success btn-circle" title="Approve" type="submit"></button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('admin.event.rejectStudent', $user->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        <input name="event_id" type="hidden" value="{{ $events->event_id }}">
                                        <button class="btn btn-danger btn-circle" title="Reject" type="submit"></button>
                                    </form>
                                </td>
                            @elseif($user->pivot->is_approved == 1)
                                <td>Accepted</td>
                                <td>-</td>
                                <td>-</td>
                            @else
                                <td>Rejected</td>
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
