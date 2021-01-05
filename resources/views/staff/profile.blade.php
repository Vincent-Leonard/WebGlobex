@extends('layouts.app')
@section('content')
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col">Staff Profile</h1>
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
                        : {{$user->staff->staff_name}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <h6>NIDN</h6>
                    </div>
                    <div class="col-md-9">
                        : {{$user->staff->nidn}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <h6>Email</h6>
                    </div>
                    <div class="col-md-9">
                        : {{$user->staff->staff_email}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <h6>Description</h6>
                    </div>
                    <div class="col-md-9">
                        : {{$user->staff->description}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <h6>Gender</h6>
                    </div>
                    <div class="col-md-9">
                        : @switch($user->staff->staff_gender)
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
                        : {{$user->staff->staff_phone}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <h6>Line Account</h6>
                    </div>
                    <div class="col-md-9">
                        : {{$user->staff->staff_line_account}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <h6>Department</h6>
                    </div>
                    <div class="col-md-9">
                        : {{$user->staff->department->department_name}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <h6>Title</h6>
                    </div>
                    <div class="col-md-9">
                        : {{$user->staff->title->title_name}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
