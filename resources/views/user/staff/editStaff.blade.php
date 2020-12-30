@extends('layouts.layout')
@section('content')
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col">Edit Staff</h1>
        </div>
        <div class="row">
            <div class="col">
            <form action="{{ route('staff.update', $model->staff_id) }}" method="post">
                @csrf
                    <input type="hidden" name="_method" value="PATCH"/>
                    <div class="form-group">
                        <label>NIDN:</label>
                        <input type="text" class="form-control" name="nidn" value="{{ $staff->nidn }}">
                    </div>
                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" class="form-control" name="staff_name" value="{{ $staff->staff_name }}">
                    </div>
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="text" class="form-control" name="staff_email" value="{{ $staff->staff_email }}">
                    </div>
                    <div class="form-group">
                        <label>Description:</label>
                        <input type="text" class="form-control" name="description" value="{{ $staff->description }}">
                    </div>
                    <div class="form-group">
                        <label>Photo:</label><br>
                        <input type="file" name="staff_photo" value="{{ $staff->staff_photo }}">
                    </div>
                    <div class="form-group">
                        <label>Gender:</label>
                        <?php
                        $selected_male = '';
                        if ( $staff->staff_gender == "0" ) {
                            $selected_male = 'selected';
                        }
                        $selected_female = '';
                        if ( $staff->staff_gender == "1" ) {
                            $selected_female = 'selected';
                        }
                        ?>
                        <select name="staff_gender" class="custom-select">
                            <option value="0" {{ $selected_male }}>Male</option>
                            <option value="1" {{ $selected_female }}>Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="number" class="form-control" name="staff_phone" value="{{ $staff->staff_phone }}">
                    </div>
                    <div class="form-group">
                        <label>Line Account:</label>
                        <input type="text" class="form-control" name="staff_line_account" value="{{ $staff->staff_line_account }}">
                    </div>
                    <div class="form-group">
                        <label>Department:</label>
                        <select name="department_id" class="custom-select">
                            @foreach($departments as $department)
                            <?php
                            $selected = '';
                            if ( $staff->department_id == $department->department_id ) {
                                $selected = 'selected';
                            }
                            ?>
                            <option value="{{ $department->department_id }}" {{ $selected }}>{{$department->department_id.'. '. $department->department_name .'('. $department->initial .')' }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Title:</label>
                        <select name="title_id" class="custom-select">
                            @foreach($titles as $title)
                            <?php
                            $selected = '';
                            if ( $staff->title_id == $title->title_id ) {
                                $selected = 'selected';
                            }
                            ?>
                            <option value="{{ $title->title_id }}" {{ $selected }}>{{ $title->title_id.'. '. $title->title_name }}</option>
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
