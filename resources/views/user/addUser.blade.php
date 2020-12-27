@extends('layouts.layout')
@section('content')
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col">Add Student</h1>
        </div>
        <div class="row">
            <div class="col">
            <form action="{{route('event.store')}}" method="post">
                {{csrf_field()}}
                    <div class="form-group">
                        <label>NIM:</label>
                        <input type="text" class="form-control" id="nim" name="nim">
                    </div>
                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="text" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label>Batch:</label>
                        <input type="year" class="form-control" id="batch" name="batch">
                    </div>
                    <div class="form-group">
                        <label>Description:</label>
                        <input type="text" class="form-control" id="description" name="description">
                    </div>
                    <div class="form-group">
                        <label>Photo:</label><br>
                        <input type="file" id="photo" name="photo">
                    </div>
                    <div class="form-group">
                        <label>Gender:</label>
                        <select name="gender" class="custom-select">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="number" class="form-control" id="phone" name="phone">
                    </div>
                    <div class="form-group">
                        <label>Line Account:</label>
                        <input type="text" class="form-control" id="line" name="line">
                    </div>
                    <div class="form-group">
                        <label>Department:</label>
                        <select name="department" class="custom-select">
                            @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name .'('. $user->email .')' }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
