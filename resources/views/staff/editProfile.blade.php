@extends('layouts.layout')
@section('content')
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col">Edit Profile</h1>
        </div>
        <div class="row">
            <div class="col">
            <form action="{{ route('staff.user.update', $user) }}" method="post" enctype="multipart/form-data">
                @csrf
                    <input type="hidden" name="_method" value="PATCH"/>
                    <div class="form-group">
                        <label>NIM:</label>
                        <input type="text" class="form-control" name="nim" value="{{ $user->staff->nim }}" required>
                    </div>
                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" class="form-control" name="staff_name" value="{{ $user->staff->staff_name }}" required>
                    </div>
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="text" class="form-control" name="email" value="{{ $user->staff->staff_email }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Batch:</label>
                        <input type="year" class="form-control" name="batch" value="{{ $user->staff->batch }}" required>
                    </div>
                    <div class="form-group">
                        <label>Description:</label>
                        <input type="text" class="form-control" name="description" value="{{ $user->staff->description }}" required>
                    </div>
                    <img style="height: 200px" src="/images/profile_picture/staff/{{$user->staff->staff_photo}}" alt="">
                    <div class="form-group">
                        <label>Change Photo:</label><br>
                        <input type="file" name="staff_photo" value="{{ $user->staff->staff_photo }}">
                    </div>
                    <div class="form-group">
                        <label>Gender:</label>
                        <?php
                        $selected_male = '';
                        if ( $user->staff->staff_gender == "0" ) {
                            $selected_male = 'selected';
                        }
                        $selected_female = '';
                        if ( $user->staff->staff_gender == "1" ) {
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
                        <input type="number" class="form-control" name="staff_phone" value="{{ $user->staff->staff_phone }}" required>
                    </div>
                    <div class="form-group">
                        <label>Line Account:</label>
                        <input type="text" class="form-control" name="staff_line_account" value="{{ $user->staff->staff_line_account }}" required>
                    </div>
                    <div class="form-group">
                        <label>Department:</label>
                        <select name="department_id" class="custom-select">
                            @foreach($departments as $department)
                            <?php
                            $selected = '';
                            if ( $user->staff->department_id == $department->department_id ) {
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
