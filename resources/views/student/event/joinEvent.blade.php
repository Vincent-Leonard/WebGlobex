@extends('layouts.app')
@section('content')

    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col text-center"><b>List Join Events</b></h1>
        </div>
        <div class="row">
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for event.."
                style="border: 0; border-radius: 3px">
        </div>
        <div class="row"
            style="margin-top: 10px; width:60%; float:left; background:rgba(255, 255, 255, 0.8); height: 450px; overflow-y: scroll;">
            <table class="table table-striped" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">Event</th>
                        <th scope="col">Type</th>
                        <th scope="col">Date</th>
                        <th scope="col">Join</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($events as $event)
                        <tr>
                            <td><a href="@auth{{ route('student.join.show', $event) }}@endauth">{{ $event->event }}</td>
                            @if ($event->type == 0)
                                <td>Student Exchange</td>
                            @else
                                <td>Student Excursion</td>
                            @endif
                            <td>{{ $event->event_date }}</td>
                            @if ($event->status == 4)
                                <td>
                                    <form action="{{ route('student.join.group') }}" method="POST">
                                        @csrf
                                        <input name="id" type="hidden" value="{{ $event->event_id }}">
                                        <button class="btn btn-primary" type="submit">Join</button>
                                    </form>
                                </td>
                            @elseif($event->status == 5)
                                <td>Event Closed</td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @if ($pages == 'index')
            <div
                style="width: 32%; float:left; margin-left: 90px; margin-top: 10px; padding:20px; background:rgba(255, 255, 255, 0.8); height: 450px; overflow-y: scroll;">
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
            <div
                style="width: 32%; float:left; margin-left: 90px; margin-top: 10px; padding:20px; background:rgba(255, 255, 255, 0.8); height: 450px; overflow-y: scroll;">
                <div class="form-event" style="margin-bottom: 10px;">
                    <label>Event :</label>
                    <input type="text" class="form-control" name="event" value="{{ $return->event }}" readonly>
                </div>
                <?php if ($return->type == 0) {
                $type = 'Student Exchange';
                } else {
                $type = 'Student Excursion';
                } ?>
                <div class="form-event" style="margin-bottom: 10px;">
                    <label>Type :</label>
                    <input type="text" class="form-control" name="type" value="{{ $type }}" readonly>
                </div>
                <div class="form-event" style="margin-bottom: 10px;">
                    <label>Date :</label>
                    <input type="text" class="form-control" name="date" value="{{ $return->event_date }}" readonly>
                </div>
                <div class="form-event" style="margin-bottom: 10px;">
                    <label>Duration :</label>
                    <input type="text" class="form-control" name="duration" value="{{ $return->duration }}" readonly>
                </div>
                <div class="form-event" style="margin-bottom: 10px;">
                    <label>Country :</label>
                    <input type="text" class="form-control" name="country" value="{{ $return->country }}" readonly>
                </div>
                <div class="form-event" style="margin-bottom: 10px;">
                    <label>City :</label>
                    <input type="text" class="form-control" name="city" value="{{ $return->city }}" readonly>
                </div>
                <div class="form-event" style="margin-bottom: 10px;">
                    <label>Orginizer :</label>
                    <input type="text" class="form-control" name="orginizer" value="{{ $return->organizer }}" readonly>
                </div>
                @if ($return->status == 4)
                    <form action="{{ route('student.join.group') }}" method="POST">
                        @csrf
                        <input name="id" type="hidden" value="{{ $return->event_id }}">
                        <button class="btn btn-primary" type="submit">Join</button>
                    </form>
                @elseif($return->status == 5)
                    Event Closed
                @endif
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
