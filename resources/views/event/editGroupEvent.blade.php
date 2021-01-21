@extends('layouts.layout')
@section('content')
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col">Edit Event</h1>
        </div>
        <div class="row">
            <div class="col">
            <form action="{{route('admin.group.update', $event)}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <input name="_method" type="hidden" value="PATCH">
                    <div class="form-group">
                        <label for="nama">Event:</label>
                        <input type="text" class="form-control" id="event" name="event" value="{{ $event->event }}">
                    </div>
                    <div class="form-group">
                        <label>Type:</label>
                        <select name = "type" class = "custom-select">
                            @if($event->type == "0")
                                <option value="0" selected>Student Exchange</option>
                                <option value="1">Student Excursion</option>
                            @else
                                <option value="0">Student Exchange</option>
                                <option value="1" selected>Student Excursion</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama">Date:</label>
                        <input type="date" class="form-control" id="date" name="event_date" value="{{ $event->event_date }}">
                    </div>
                    <div class="form-group">
                        <label for="barcode">Duration:</label>
                        <input type="text" class="form-control" id="duration" name="duration" value="{{ $event->duration }}">
                    </div>
                    <div class="form-group">
                        <label for="nama">Country:</label>
                        <input type="text" class="form-control" id="country" name="country" value="{{ $event->country }}">
                    </div>
                    <div class="form-group">
                        <label for="barcode">City:</label>
                        <input type="text" class="form-control" id="city" name="city" value="{{ $event->city }}">
                    </div>
                    <div class="form-group">
                        <label for="barcode">Organizer:</label>
                        <input type="text" class="form-control" id="organizer" name="organizer" value="{{ $event->organizer }}">
                    </div>
                    <img style="height: 200px" src="/images/event/group/{{ $event->file }}" alt="">
                    <div class="form-group">
                        <label for="barcode">Change Photo</label>
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
