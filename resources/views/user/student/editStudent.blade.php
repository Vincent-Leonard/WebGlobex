@extends('layouts.layout')
@section('content')
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col">Edit Student</h1>
        </div>
        <div class="row">
            <div class="col">
            <form action="{{ route('student.update', $model->student_id) }}" method="post">
                @csrf
                    <input type="hidden" name="_method" value="PATCH"/>
                    <div class="form-group">
                        <label>NIM:</label>
                        <input type="text" class="form-control" name="nim" value="{{ $student->nim }}">
                    </div>
                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" class="form-control" name="student_name" value="{{ $student->student_name }}">
                    </div>
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="text" class="form-control" name="student_email" value="{{ $student->student_email }}">
                    </div>
                    <div class="form-group">
                        <label>Batch:</label>
                        <input type="year" class="form-control" name="batch" value="{{ $student->batch }}">
                    </div>
                    <div class="form-group">
                        <label>Description:</label>
                        <input type="text" class="form-control" name="description" value="{{ $student->description }}">
                    </div>
                    <div class="form-group">
                        <label>Photo:</label><br>
                        <input type="file" name="student_photo" value="{{ $student->student_photo }}">
                    </div>
                    <div class="form-group">
                        <label>Gender:</label>
                        <?php
                        $selected_male = '';
                        if ( $student->student_gender == "0" ) {
                            $selected_male = 'selected';
                        }
                        $selected_female = '';
                        if ( $student->student_gender == "1" ) {
                            $selected_female = 'selected';
                        }
                        ?>
                        <select name="student_gender" class="custom-select">
                            <option value="0" {{ $selected_male }}>Male</option>
                            <option value="1" {{ $selected_female }}>Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="number" class="form-control" name="student_phone" value="{{ $student->student_phone }}">
                    </div>
                    <div class="form-group">
                        <label>Line Account:</label>
                        <input type="text" class="form-control" name="student_line_account" value="{{ $student->student_line_account }}">
                    </div>
                    <div class="form-group">
                        <label>Department:</label>
                        <select name="department_id" class="custom-select">
                            @foreach($departments as $department)
                            <?php
                            $selected = '';
                            if ( $student->department_id == $department->department_id ) {
                                $selected = 'selected';
                            }
                            ?>
                            <option value="{{ $department->department_id }}" {{ $selected }}>{{$department->department_id.'. '. $department->department_name .'('. $department->initial .')' }}</option>
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
