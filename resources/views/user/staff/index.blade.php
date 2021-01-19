@extends('layouts.app')
@section('content')

        <div class="container" style="margin-top: 20px;">
            <div class="row">
                <h1 class="col text-center">List Staff</h1>
            </div>
            <div class="row offset-md11">
                <div>
                    <a href="{{route('admin.student.index')}}" class="col botn-set-2"><b>Student</b></a>
                    <a href="{{route('admin.lecturer.index')}}" class="col botn-set-2">Lecturer</a>
                    <a href="{{route('admin.staff.index')}}" class="col botn-set-2">Staff</a>
                </div>
                <div class="col-md-2 offset-md-10">
                    <a href="{{ route('admin.staff.create') }}" class="btn btn-primary btn-block" role="button" aria-pressed="true">Tambah</a>
                </div>
            </div>
            <div class="row" style="margin-top: 30px;">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Title</th>
                            <th scope="col">Department</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($staffs as $staff)
                            <tr>
                                <td>{{$staff->staff_id}}</td>
                                <td><a href="{{ route('admin.staff.show', $staff) }}">{{ $staff->staff_name }}</a></td>
                                <td>{{$staff->title_id}}</td>
                                <td>{{$staff->department_id}}</td>
                                {{-- @auth --}}
                                <td>
                                    <form action="{{ route('admin.staff.edit', $staff) }}" method="GET">
                                        @csrf
                                        <button class="btn btn-primary" type="submit">Edit</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('admin.staff.destroy', $staff) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                                {{-- @endauth --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
@endsection
