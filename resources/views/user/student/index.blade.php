@extends('layouts.app')
@section('content')

        <div class="container" style="margin-top: 20px;">
            <div class="row">
                <h1 class="col">List student</h1>
            </div>
            <div class="row">
                {{-- @auth --}}
                <div class="col-md-2 offset-md-10">
                    <a href="{{route('student.create')}}" class="btn btn-primary btn-block" role="button" aria-pressed="true">Tambah</a>
                </div>
                {{-- @endauth --}}
            </div>
            <div class="row" style="margin-top: 30px;">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Department</th>
                            <th scope="col">Batch</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td>{{$student->student_id}}</td>
                                <td><a href="{{ route('student.show', $student) }}">{{ $student->student_name }}</a></td>
                                <td>{{$student->department_id}}</td>
                                <td>{{$student->batch}}</td>
                                {{-- @auth --}}
                                <td>
                                    <form action="{{ route('student.edit', $student) }}" method="GET">
                                        @csrf
                                        <button class="btn btn-primary" type="submit">Edit</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('student.destroy', $student) }}" method="post">
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
