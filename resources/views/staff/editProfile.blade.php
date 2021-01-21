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
                        <label>NIDN:</label>
                        <input type="text" class="form-control" name="nidn" value="{{ $user->staff->nidn }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" class="form-control" name="staff_name" value="{{ $user->staff->staff_name }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="text" class="form-control" name="email" value="{{ $user->staff->staff_email }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Description:</label>
                        <input type="text" class="form-control" name="description" value="{{ $user->staff->description }}" readonly>
                    </div>
                    <img style="height: 200px" src="/images/profile_picture/staff/{{$user->staff->staff_photo}}" alt="">
                    <div class="form-group">
                        <label>Change Photo:</label><br>
                        <input type="file" name="staff_photo" value="{{ $user->staff->staff_photo }}">
                    </div>
                    <div class="form-group">
                        <label>Gender:</label>
                        <?php
                            if($user->staff->staff_gender == 0){
                                $gender = "Male";
                            }else{
                                $gender = "Female";
                            }
                        ?>
                        <input type="text" class="form-control" name="staff_line_account" value="{{ $gender }}" readonly>
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
                        <input type="text" class="form-control" name="department" value="{{ $user->staff->department->department_name.' ('. $user->staff->department->initial.')' }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Title:</label>
                        <input type="text" class="form-control" name="title" value="{{ $user->staff->title->title_name }}" readonly>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-secondary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
