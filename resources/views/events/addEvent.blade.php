@extends('layouts.layout')
@section('content')
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col">Masukan Data</h1>
        </div>
        <div class="row">
            <div class="col">
            <form action="{{route('event.store')}}" method="post">
                {{csrf_field()}}
                    <div class="form-group">
                        <label for="nama">Event:</label>
                        <input type="text" class="form-control" id="event" name="event">
                    </div>
                    <div class="form-group">
                        <label for="barcode">Type:</label>
                        <input type="text" class="form-control" id="type" name="type">
                    </div>
                   
                    <br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection