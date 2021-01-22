@extends('layouts.app')
@section('content')
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col text-center"><b>List Student</b></h1>
        </div>
        <div class="row offset-md11">
            <div>
                <a href="{{ route('admin.student.index') }}" class="col botn-set-2" style="margin-left: 25px"><b>Student</b></a>
                <a href="{{ route('admin.lecturer.index') }}" class="col botn-set-2">Lecturer</a>
                <a href="{{ route('admin.staff.index') }}" class="col botn-set-2">Staff</a>
            </div>
            <div class="col-md-2 offset-md-9">
                <a href="{{ route('admin.student.create') }}" class="btn btn-primary" role="button"
                    aria-pressed="true">Tambah</a>
            </div>
        </div>
        <div class="row">
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for student.."
                style="border: 0; border-radius: 3px">
        </div>
        <div class="row"
            style="margin-top: 10px; width:60%; float:left; background:rgba(255, 255, 255, 0.8); height: 450px; overflow-y: scroll;">
            <table class="table table-striped" id="myTable">
                <thead>
                    <tr>
                        {{-- <th scope="col">ID</th> --}}
                        <th scope="col">Name</th>
                        <th scope="col">Department</th>
                        <th scope="col">Batch</th>
                        <th scope="col">Gender</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            {{-- <td>{{ $student->student_id }}</td> --}}
                            <td><a href="{{ route('admin.student.show', $student) }}">{{ $student->student_name }}</a></td>
                            <td>{{ $student->department->department_name }}</td>
                            <td>{{ $student->batch }}</td>
                            <?php
                            if ($student->student_gender == 0) {
                                $gender = 'Male';
                            } else {
                                $gender = 'Female';
                            }
                            ?>
                            <td>{{ $gender }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @if ($pages == 'index')
            <div
                style="width: 32%; float:left; margin-left: 90px; margin-top: 10px; padding:20px; background:rgba(255, 255, 255, 0.8); height: 450px; overflow-y: scroll;">
                <div class="form-group">
                    <label>NIM:</label>
                    <input type="text" class="form-control" name="nim" readonly>
                </div>
                <div class="form-group">
                    <label>Name:</label>
                    <input type="text" class="form-control" name="student_name" readonly>
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input type="text" class="form-control" name="email" readonly>
                </div>
                <div class="form-group">
                    <label>Batch:</label>
                    <input type="year" class="form-control" name="batch" readonly>
                </div>
                <div class="form-group">
                    <label>Description:</label>
                    <input type="text" class="form-control" name="description" readonly>
                </div>
                <div class="form-group">
                    <label>Gender:</label>
                    <input type="text" class="form-control" name="student_gender" readonly>
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="number" class="form-control" name="student_phone" readonly>
                </div>
                <div class="form-group">
                    <label>Line Account:</label>
                    <input type="text" class="form-control" name="student_line_account" readonly>
                </div>
                <div class="form-group">
                    <label>Admin:</label>
                    <input type="number" class="form-control" name="is_admin" readonly>
                </div>
                <div class="form-group">
                    <label>Department:</label>
                    <input type="number" class="form-control" name="department" readonly>
                </div>
            </div>
        @elseif($pages == 'showit')
            <div
                style="width: 32%; float:left; margin-left: 90px; margin-top: 10px; padding:20px; background:rgba(255, 255, 255, 0.8); height: 450px; overflow-y: scroll;">
                <div class="form-group">
                    <label>NIM:</label>
                    <input type="text" class="form-control" name="nim" value="{{ $return->nim }}" readonly>
                </div>
                <div class="form-group">
                    <label>Name:</label>
                    <input type="text" class="form-control" name="student_name" value="{{ $return->student_name }}"
                        readonly>
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input type="text" class="form-control" name="email" value="{{ $return->student_email }}" readonly>
                </div>
                <div class="form-group">
                    <label>Batch:</label>
                    <input type="year" class="form-control" name="batch" value="{{ $return->batch }}" readonly>
                </div>
                <div class="form-group">
                    <label>Description:</label>
                    <input type="text" class="form-control" name="description" value="{{ $return->description }}" readonly>
                </div>
                <?php
                if ($return->student_gender == 0) {
                    $gender = 'Male';
                } else {
                    $gender = 'Female';
                }
                ?>
                <div class="form-group">
                    <label>Gender:</label>
                    <input type="text" class="form-control" name="student_gender" value="{{ $gender }}" readonly>
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="number" class="form-control" name="student_phone" value="{{ $return->student_phone }}"
                        readonly>
                </div>
                <div class="form-group">
                    <label>Line Account:</label>
                    <input type="text" class="form-control" name="student_line_account"
                        value="{{ $return->student_line_account }}" readonly>
                </div>
                <div class="form-group">
                    <label>Department:</label>
                    <input type="text" class="form-control" name="department" value="{{ $return->department->department_name }}" readonly>
                </div>
                <img style="height: 200px" src="/images/profile_picture/student/{{ $return->student_photo }}" alt="">
                <br><br>
                <form action="{{ route('admin.student.edit', $return) }}" method="GET">
                    @csrf
                    <button class="btn btn-normal" type="submit" style="float: left; margin-right: 10px">Edit</button>
                </form>
                <form action="{{ route('admin.student.destroy', $return) }}" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        @endif
    </div>
    <script>
        function myFunction() {
          // Declare variables
          var input, filter, table, tr, td, i, txtValue;
          input = document.getElementById("myInput");
          filter = input.value.toUpperCase();
          table = document.getElementById("myTable");
          tr = table.getElementsByTagName("tr");

          // Loop through all table rows, and hide those who don't match the search query
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
              txtValue = td.textContent || td.innerText;
              if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }
          }
        }
    </script>
@endsection
