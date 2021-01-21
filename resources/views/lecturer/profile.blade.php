@extends('layouts.app')
@section('content')
    <div class="container" style="margin-top: 5px;">
        <div style="background-color:rgba(255, 255, 255, 1); padding: 20px">
            <div class="row">
                <h1 class="col">Lecturer Profile</h1>
            </div>
            <br>
            <div style="float:left">
                <img src="/images/profile_picture/lecturer/{{ $user->lecturer->lecturer_photo }}" style="height: 200px"
                    alt="">
            </div>
            <div style="border-left: 2px solid black; height: 590px; float: left; margin-left: 50px; margin-right: 30px">
            </div>
            <div class="row" style="font-size: 16px;">
                <div class="col">
                    <div class="row">
                        <div class="col-md-3">
                            Name
                        </div>
                        <div class="col-md-9">
                            : {{ $user->lecturer->lecturer_name }}
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">
                            NIP
                        </div>
                        <div class="col-md-9">
                            : {{ $user->lecturer->nip }}
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-3">
                            NIDN
                        </div>
                        <div class="col-md-9">
                            : {{ $user->lecturer->nidn }}
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-3">
                            Email
                        </div>
                        <div class="col-md-9">
                            : {{ $user->email }}
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-3">
                            Description
                        </div>
                        <div class="col-md-9">
                            : {{ $user->lecturer->description }}
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-3">
                            Gender
                        </div>
                        <div class="col-md-9">
                            : @switch($user->lecturer->lecturer_gender)
                                @case('0')
                                Male
                                @break
                                @case('1')
                                Female
                                @break
                            @endswitch
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-3">
                            Phone
                        </div>
                        <div class="col-md-9">
                            : {{ $user->lecturer->lecturer_phone }}
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-3">
                            Line Account
                        </div>
                        <div class="col-md-9">
                            : {{ $user->lecturer->lecturer_line_account }}
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-3">
                            Department
                        </div>
                        <div class="col-md-9">
                            : {{ $user->lecturer->department->department_name }}
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-3">
                            Title
                        </div>
                        <div class="col-md-9">
                            : {{ $user->lecturer->title->title_name }}
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-3">
                            Jaka
                        </div>
                        <div class="col-md-9">
                            : {{ $user->lecturer->jaka->jaka_name }}
                        </div>
                    </div>
                    <br>
                    <form action="{{ route('lecturer.user.edit', $user) }}" method="GET">
                        @csrf
                        <button class="btn btn-secondary" type="submit" style="width: 100px;; float: right;">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
