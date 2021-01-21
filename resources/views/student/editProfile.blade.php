@extends('layouts.layout')
@section('content')
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col">Edit Profile</h1>
        </div>
        <div class="row">
            <div class="col">
            <form action="{{ route('student.user.update', $user) }}" method="post" enctype="multipart/form-data">
                @csrf
                    <input type="hidden" name="_method" value="PATCH"/>
                    <div class="form-group">
                        <label>NIM:</label>
                        <input type="text" class="form-control" name="nim" value="{{ $user->student->nim }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" class="form-control" name="student_name" value="{{ $user->student->student_name }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="text" class="form-control" name="email" value="{{ $user->student->student_email }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Batch:</label>
                        <input type="year" class="form-control" name="batch" value="{{ $user->student->batch }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Description:</label>
                        <input type="text" class="form-control" name="description" value="{{ $user->student->description }}" readonly>
                    </div>
                    <img style="height: 200px" src="/images/profile_picture/student/{{$user->student->student_photo}}" alt="">
                    <div class="form-group">
                        <label>Change Photo:</label><br>
                        <input type="file" name="student_photo" value="{{ $user->student->student_photo }}">
                    </div>
                    <div class="form-group">
                        <label>Gender:</label>
                        <?php
                            if($user->student->student_gender == 0){
                                $gender = "Male";
                            }else{
                                $gender = "Female";
                            }
                        ?>
                        <input type="text" class="form-control" name="student_line_account" value="{{ $gender }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="number" class="form-control" name="student_phone" value="{{ $user->student->student_phone }}" required>
                    </div>
                    <div class="form-group">
                        <label>Line Account:</label>
                        <input type="text" class="form-control" name="student_line_account" value="{{ $user->student->student_line_account }}" required>
                    </div>
                    <div class="form-group">
                        <label>Department:</label>
                        <input type="text" class="form-control" name="department" value="{{ $user->student->department->department_name.' ('. $user->student->department->initial.')' }}" readonly>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-secondary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
