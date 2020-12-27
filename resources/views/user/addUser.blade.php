@extends('layouts.layout')
@section('content')
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col">Add Student</h1>
        </div>
        <div class="row">
            <div class="col">
            <form action="{{route('student.store')}}" method="post">
                {{csrf_field()}}
                    <div class="form-group">
                        <label>NIM:</label>
                        <input type="text" class="form-control" name="nim">
                    </div>
                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" class="form-control" name="student_name">
                    </div>
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="text" class="form-control" name="student_email">
                    </div>
                    <div class="form-group">
                        <label>Batch:</label>
                        <input type="year" class="form-control" name="batch">
                    </div>
                    <div class="form-group">
                        <label>Description:</label>
                        <input type="text" class="form-control" name="description">
                    </div>
                    <div class="form-group">
                        <label>Photo:</label><br>
                        <input type="file" name="student_photo">
                    </div>
                    <div class="form-group">
                        <label>Gender:</label>
                        <select name="student_gender" class="custom-select">
                            <option value="0">Male</option>
                            <option value="1">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="number" class="form-control" name="student_phone">
                    </div>
                    <div class="form-group">
                        <label>Line Account:</label>
                        <input type="text" class="form-control" name="student_line_account">
                    </div>
                    <div class="form-group">
                        <label>Department:</label>
                        <select name="department_id" class="custom-select">
                            @foreach($departments as $department)
                            <option value="{{ $department->department_id }}">{{$department->department_id.'. '. $department->department_name .'('. $department->initial .')' }}</option>
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
