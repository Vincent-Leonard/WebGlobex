@extends('layouts.app')
@section('content')
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col">Student Profile</h1>
        </div>
        <div style="float: right">
        <img src="/images/profile_picture/student/{{$user->student->student_photo}}" style="height: 250px" alt="">
        </div>
        <div style="float: left" class="row">
            <div class="col">
                <div class="row">
                    <div class="col-md-3">
                        <h6>Name</h6>
                    </div>
                    <div class="col-md-9">
                        : {{$user->student->student_name}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <h6>NIM</h6>
                    </div>
                    <div class="col-md-9">
                        : {{$user->student->nim}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <h6>Batch</h6>
                    </div>
                    <div class="col-md-9">
                        : {{$user->student->batch}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <h6>Email</h6>
                    </div>
                    <div class="col-md-9">
                        : {{$user->email}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <h6>Description</h6>
                    </div>
                    <div class="col-md-9">
                        : {{$user->student->description}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <h6>Gender</h6>
                    </div>
                    <div class="col-md-9">
                        : @switch($user->student->student_gender)
                            @case('0')
                            Male
                            @break
                            @case('1')
                            Female
                            @break
                        @endswitch
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <h6>Phone</h6>
                    </div>
                    <div class="col-md-9">
                        : {{$user->student->student_phone}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <h6>Line Account</h6>
                    </div>
                    <div class="col-md-9">
                        : {{$user->student->student_line_account}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <h6>Department</h6>
                    </div>
                    <div class="col-md-9">
                        : {{$user->student->department->department_name}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
