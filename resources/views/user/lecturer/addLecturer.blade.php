@extends('layouts.layout')
@section('content')
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col">Add Lecturer</h1>
        </div>
        <div class="row">
            <div class="col">
            <form action="{{route('lecturer.store')}}" method="post">
                @csrf
                    <div class="form-group">
                        <label>NIP:</label>
                        <input type="text" class="form-control" name="nip">
                    </div>
                    <div class="form-group">
                        <label>NIDN:</label>
                        <input type="text" class="form-control" name="nidn">
                    </div>
                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" class="form-control" name="lecturer_name">
                    </div>
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="text" class="form-control" name="lecturer_email">
                    </div>
                    <div class="form-group">
                        <label>Description:</label>
                        <input type="text" class="form-control" name="description">
                    </div>
                    <div class="form-group">
                        <label>Photo:</label><br>
                        <input type="file" name="lecturer_photo">
                    </div>
                    <div class="form-group">
                        <label>Gender:</label>
                        <select name="lecturer_gender" class="custom-select">
                            <option value="0">Male</option>
                            <option value="1">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="number" class="form-control" name="lecturer_phone">
                    </div>
                    <div class="form-group">
                        <label>Line Account:</label>
                        <input type="text" class="form-control" name="lecturer_line_account">
                    </div>
                    <div class="form-group">
                        <label>Department:</label>
                        <select name="department_id" class="custom-select">
                            @foreach($departments as $department)
                            <option value="{{ $department->department_id }}">{{$department->department_id.'. '. $department->department_name .'('. $department->initial .')' }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Title:</label>
                        <select name="title_id" class="custom-select">
                            @foreach($titles as $title)
                            <option value="{{ $title->title_id }}">{{ $title->title_id.'. '. $title->title_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jaka:</label>
                        <select name="jaka_id" class="custom-select">
                            @foreach($jakas as $jaka)
                            <option value="{{ $jaka->jaka_id }}">{{ $jaka->jaka_id.'. '. $jaka->jaka_name }}</option>
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
