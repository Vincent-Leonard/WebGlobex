@extends('layouts.layout')
@section('content')
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col">Edit Lecturer</h1>
        </div>
        <div class="row">
            <div class="col">
            <form action="{{ route('admin.lecturer.update', $model->lecturer_id) }}" method="post" enctype="multipart/form-data">
                @csrf
                    <input type="hidden" name="_method" value="PATCH"/>
                    <div class="form-group">
                        <label>NIP:</label>
                        <input type="text" class="form-control" name="nip" value="{{ $lecturer->nip }}" required>
                    </div>
                    <div class="form-group">
                        <label>NIDN:</label>
                        <input type="text" class="form-control" name="nidn" value="{{ $lecturer->nidn }}" required>
                    </div>
                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" class="form-control" name="lecturer_name" value="{{ $lecturer->lecturer_name }}" required>
                    </div>
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="text" class="form-control" name="lecturer_email" value="{{ $lecturer->lecturer_email }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Description:</label>
                        <input type="text" class="form-control" name="description" value="{{ $lecturer->description }}" required>
                    </div>
                    <img style="height: 200px" src="/images/profile_picture/lecturer/{{$lecturer->lecturer_photo}}" alt="">
                    <div class="form-group">
                        <label>Change Photo:</label><br>
                        <input type="file" name="lecturer_photo" value="{{ $lecturer->lecturer_photo }}">
                    </div>
                    <div class="form-group">
                        <label>Gender:</label>
                        <?php
                        $selected_male = '';
                        if ( $lecturer->lecturer_gender == "0" ) {
                            $selected_male = 'selected';
                        }
                        $selected_female = '';
                        if ( $lecturer->lecturer_gender == "1" ) {
                            $selected_female = 'selected';
                        }
                        ?>
                        <select name="lecturer_gender" class="custom-select">
                            <option value="0" {{ $selected_male }}>Male</option>
                            <option value="1" {{ $selected_female }}>Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="number" class="form-control" name="lecturer_phone" value="{{ $lecturer->lecturer_phone }}" required>
                    </div>
                    <div class="form-group">
                        <label>Line Account:</label>
                        <input type="text" class="form-control" name="lecturer_line_account" value="{{ $lecturer->lecturer_line_account }}" required>
                    </div>
                    <div class="form-group">
                        <label>Admin:</label>
                        <?php
                        $selected_yes = '';
                        if ( $lecturer->user->is_admin == "1" ) {
                            $selected_yes = 'selected';
                        }
                        $selected_no = '';
                        if ( $lecturer->user->is_admin == "0" ) {
                            $selected_no = 'selected';
                        }
                        ?>
                        <select name="is_admin" class="custom-select">
                            <option value="0" {{ $selected_no }}>No</option>
                            <option value="1" {{ $selected_yes }}>Yes</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Department:</label>
                        <select name="department_id" class="custom-select">
                            @foreach($departments as $department)
                            <?php
                            $selected = '';
                            if ( $lecturer->department_id == $department->department_id ) {
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
                            if ( $lecturer->title_id == $title->title_id ) {
                                $selected = 'selected';
                            }
                            ?>
                            <option value="{{ $title->title_id }}" {{ $selected }}>{{ $title->title_id.'. '. $title->title_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jaka:</label>
                        <select name="jaka_id" class="custom-select">
                            @foreach($jakas as $jaka)
                            <?php
                            $selected = '';
                            if ( $lecturer->jaka_id == $jaka->jaka_id ) {
                                $selected = 'selected';
                            }
                            ?>
                            <option value="{{ $jaka->jaka_id }}" {{ $selected }}>{{ $jaka->jaka_id.'. '. $jaka->jaka_name }}</option>
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
