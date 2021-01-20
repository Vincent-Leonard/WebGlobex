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
        <div class="row" style="margin-top: 30px; width:60%; float:left; margin-left: -5px; background: white">
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for event">
            <table class="table table-striped" id="myTable">
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
                            <td><a href="@auth{{ route('student.event.show', $event) }}@endauth">{{ $event->event }}</td>
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
                            @endif
                        </tr>
                    @endforeach
                </tbody>
                <table width="550px">
                    <tr>
                        <td width="800px" height="400px"></td>
                </table>
        </div>
        @if ($pages == 'index')
            <div style="width: 25%; float:left; margin-left: 100px; margin-top: 30px; padding:30px; background: white;">
                <div class="form-event">
                    <label>Event :</label>
                    <input type="text" class="form-control" name="event" readonly>
                </div>
                <div class="form-event">
                    <label>Type :</label>
                    <input type="text" class="form-control" name="type" readonly>
                </div>
                <div class="form-event">
                    <label>Date :</label>
                    <input type="text" class="form-control" name="date" readonly>
                </div>
                <div class="form-event">
                    <label>Duration :</label>
                    <input type="text" class="form-control" name="duration" readonly>
                </div>
                <div class="form-event">
                    <label>Country :</label>
                    <input type="text" class="form-control" name="country" readonly>
                </div>
                <div class="form-event">
                    <label>City :</label>
                    <input type="text" class="form-control" name="city" readonly>
                </div>
                <div class="form-event">
                    <label>Orginizer :</label>
                    <input type="text" class="form-control" name="orginizer" readonly>
                </div>
            </div>
        @elseif($pages == 'showit')
            <div style="width: 25%; float:left; margin-left: 100px; margin-top: 30px; padding:30px; background: white;">
                <div class="form-event">
                    <label>Event :</label>
                    <input type="text" class="form-control" name="event" value="{{ $return->event }}" readonly>
                </div>
                <div class="form-event">
                    <label>Type :</label>
                    <input type="text" class="form-control" name="type" value="{{ $return->type }}" readonly>
                </div>
                <div class="form-event">
                    <label>Date :</label>
                    <input type="text" class="form-control" name="date" value="{{ $return->event_date }}" readonly>
                </div>
                <div class="form-event">
                    <label>Duration :</label>
                    <input type="text" class="form-control" name="duration" value="{{ $return->duration }}" readonly>
                </div>
                <div class="form-event">
                    <label>Country :</label>
                    <input type="text" class="form-control" name="country" value="{{ $return->country }}" readonly>
                </div>
                <div class="form-event">
                    <label>City :</label>
                    <input type="text" class="form-control" name="city" value="{{ $return->city }}" readonly>
                </div>
                <div class="form-event">
                    <label>Orginizer :</label>
                    <input type="text" class="form-control" name="orginizer" value="{{ $return->organizer }}" readonly>
                </div>
                <form action="{{ route('student.event.edit', $return) }}" method="GET">
                    @csrf
                    <button class="btn btn-primary" type="submit">Edit</button>
                </form>
                <form action="{{ route('student.event.destroy', $return) }}" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        @endif
    </div>

    <script>
        function myFunction() {
          // Declare variables
          var input, filter, table, tr, td, i, txtValue;
          input = document.getElementById("myInput");
          filter = input.value.toUpperCase();
          table = document.getElementById("myTable");
          tr = table.getElementsByTagName("tr");

          // Loop through all table rows, and hide those who don't match the search query
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
              txtValue = td.textContent || td.innerText;
              if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }
          }
        }
    </script>
@endsection
