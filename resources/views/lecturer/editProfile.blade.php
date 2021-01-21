@extends('layouts.layout')
@section('content')
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col">Edit Profile</h1>
        </div>
        <div class="row">
            <div class="col">
            <form action="{{ route('lecturer.user.update', $user) }}" method="post" enctype="multipart/form-data">
                @csrf
                    <input type="hidden" name="_method" value="PATCH"/>
                    <div class="form-group">
                        <label>NIP:</label>
                        <input type="text" class="form-control" name="nim" value="{{ $user->lecturer->nip }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>NIDN:</label>
                        <input type="text" class="form-control" name="nim" value="{{ $user->lecturer->nidn }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" class="form-control" name="lecturer_name" value="{{ $user->lecturer->lecturer_name }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="text" class="form-control" name="email" value="{{ $user->lecturer->lecturer_email }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Description:</label>
                        <input type="text" class="form-control" name="description" value="{{ $user->lecturer->description }}" readonly>
                    </div>
                    <img style="height: 200px" src="/images/profile_picture/lecturer/{{$user->lecturer->lecturer_photo}}" alt="">
                    <div class="form-group">
                        <label>Change Photo:</label><br>
                        <input type="file" name="lecturer_photo" value="{{ $user->lecturer->lecturer_photo }}">
                    </div>
                    <div class="form-group">
                        <label>Gender:</label>
                        <?php
                            if($user->lecturer->lecturer_gender == 0){
                                $gender = "Male";
                            }else{
                                $gender = "Female";
                            }
                        ?>
                        <input type="text" class="form-control" name="lecturer_line_account" value="{{ $gender }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="number" class="form-control" name="lecturer_phone" value="{{ $user->lecturer->lecturer_phone }}" required>
                    </div>
                    <div class="form-group">
                        <label>Line Account:</label>
                        <input type="text" class="form-control" name="lecturer_line_account" value="{{ $user->lecturer->lecturer_line_account }}" required>
                    </div>
                    <div class="form-group">
                        <label>Department:</label>
                        <input type="text" class="form-control" name="department" value="{{ $user->lecturer->department->department_name.' ('. $user->lecturer->department->initial.')' }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Title:</label>
                        <input type="text" class="form-control" name="title" value="{{ $user->lecturer->title->title_name }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Jaka:</label>
                        <input type="text" class="form-control" name="jaka" value="{{ $user->lecturer->jaka->jaka_name }}" readonly>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-secondary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
