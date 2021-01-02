@extends('user.lecturer.layouts.app')
@section('content')
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col">Lecturer Profile</h1>
        </div>
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col-md-3">
                        <h6>Name</h6>
                    </div>
                    <div class="col-md-9">
                        : {{$lecturer->lecturer_name}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <h6>NIP</h6>
                    </div>
                    <div class="col-md-9">
                        : {{$lecturer->nip}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <h6>NIDN</h6>
                    </div>
                    <div class="col-md-9">
                        : {{$lecturer->nidn}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <h6>Description</h6>
                    </div>
                    <div class="col-md-9">
                        : {{$lecturer->description}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <h6>Gender</h6>
                    </div>
                    <div class="col-md-9">
                        : @switch($lecturer->lecturer_gender)
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
                        : {{$lecturer->lecturer_phone}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <h6>Line Account</h6>
                    </div>
                    <div class="col-md-9">
                        : {{$lecturer->lecturer_line_account}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <h6>Department</h6>
                    </div>
                    <div class="col-md-9">
                        : {{$departments->department_name}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <h6>Title</h6>
                    </div>
                    <div class="col-md-9">
                        : {{$titles->title_name}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <h6>Jaka</h6>
                    </div>
                    <div class="col-md-9">
                        : {{$jakas->jaka_name}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection