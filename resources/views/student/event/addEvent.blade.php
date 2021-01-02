@extends('layouts.layout')
@section('content')
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col">Add Event</h1>
        </div>
        <div class="row">
            <div class="col">
            <form action="{{route('student.event.store')}}" method="post">
                {{csrf_field()}}
                    <div class="form-group">
                        <label for="nama">Event:</label>
                        <input type="text" class="form-control" id="event" name="event">
                    </div>
                    <div class="form-group">
                        <label for="user">Type:</label>
                        <select name = "type" class = "custom-select">
                            <option value="0">Student Exchange</option>
                            <option value="1">Student Excursion</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama">Date:</label>
                        <input type="date" class="form-control" id="date" name="event_date">
                    </div>
                    <div class="form-group">
                        <label for="barcode">Duration:</label>
                        <input type="text" class="form-control" id="duration" name="duration">
                    </div>
                    <div class="form-group">
                        <label for="nama">Country:</label>
                        <input type="text" class="form-control" id="country" name="country">
                    </div>
                    <div class="form-group">
                        <label for="barcode">City:</label>
                        <input type="text" class="form-control" id="city" name="city">
                    </div>
                    <div class="form-group">
                        <label for="barcode">Organizer:</label>
                        <input type="text" class="form-control" id="organizer" name="organizer">
                    </div>
                    <div class="form-group">
                        <label for="barcode">File/Photo</label>
                        <br>
                        <input type="file" id="file" name="file">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
