@extends('layouts.app')
@section('content')
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col text-center"><b>List Staff</b></h1>
        </div>
        <div class="row offset-md11">
            <div>
                <a href="{{ route('admin.student.index') }}" class="col botn-set-2" style="margin-left: 25px">Student</a>
                <a href="{{ route('admin.lecturer.index') }}" class="col botn-set-2">Lecturer</a>
                <a href="{{ route('admin.staff.index') }}" class="col botn-set-2"><b>Staff</b></a>
            </div>
            <div class="col-md-2 offset-md-9">
                <a href="{{ route('admin.staff.create') }}" class="btn btn-primary" role="button"
                    aria-pressed="true">Tambah</a>
            </div>
        </div>
        <div class="row">
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for staff.."
                style="border: 0; border-radius: 3px">
        </div>
        <div class="row"
            style="margin-top: 10px; width:60%; float:left; background:rgba(255, 255, 255, 0.8); height: 450px; overflow-y: scroll;">
            <table class="table table-striped" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Department</th>
                        <th scope="col">Title</th>
                        <th scope="col">Gender</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($staffs as $staff)
                        <tr>
                            <td>{{ $staff->staff_id }}</td>
                            <td><a href="{{ route('admin.staff.show', $staff) }}">{{ $staff->staff_name }}</a></td>
                            <td>{{ $staff->department->department_name }}</td>
                            <td>{{ $staff->title->title_name }}</td>
                            <?php
                            if ($staff->staff_gender == 0) {
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
                    <label>NIDN:</label>
                    <input type="text" class="form-control" name="nidn" readonly>
                </div>
                <div class="form-group">
                    <label>Name:</label>
                    <input type="text" class="form-control" name="staff_name" readonly>
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input type="text" class="form-control" name="email" readonly>
                </div>
                <div class="form-group">
                    <label>Description:</label>
                    <input type="text" class="form-control" name="description" readonly>
                </div>
                <div class="form-group">
                    <label>Gender:</label>
                    <input type="text" class="form-control" name="staff_gender" readonly>
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="number" class="form-control" name="staff_phone" readonly>
                </div>
                <div class="form-group">
                    <label>Line Account:</label>
                    <input type="text" class="form-control" name="staff_line_account" readonly>
                </div>
                <div class="form-group">
                    <label>Admin:</label>
                    <input type="number" class="form-control" name="is_admin" readonly>
                </div>
                <div class="form-group">
                    <label>Department:</label>
                    <input type="number" class="form-control" name="department_id" readonly>
                </div>
                <div class="form-group">
                    <label>Title:</label>
                    <input type="year" class="form-control" name="title_id" readonly>
                </div>
            </div>
        @elseif($pages == 'showit')
            <div
                style="width: 32%; float:left; margin-left: 90px; margin-top: 10px; padding:20px; background:rgba(255, 255, 255, 0.8); height: 450px; overflow-y: scroll;">
                <div class="form-group">
                    <label>NIDN:</label>
                    <input type="text" class="form-control" name="email" value="{{ $return->nidn }}" readonly>
                </div>
                <div class="form-group">
                    <label>Name:</label>
                    <input type="text" class="form-control" name="staff_name" value="{{ $return->staff_name }}"
                        readonly>
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input type="text" class="form-control" name="email" value="{{ $return->staff_email }}" readonly>
                </div>
                <div class="form-group">
                    <label>Description:</label>
                    <input type="text" class="form-control" name="description" value="{{ $return->description }}" readonly>
                </div>
                <?php
                if ($return->staff_gender == 0) {
                    $gender = 'Male';
                } else {
                    $gender = 'Female';
                }
                ?>
                <div class="form-group">
                    <label>Gender:</label>
                    <input type="text" class="form-control" name="staff_gender" value="{{ $gender }}" readonly>
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="number" class="form-control" name="staff_phone" value="{{ $return->staff_phone }}"
                        readonly>
                </div>
                <div class="form-group">
                    <label>Line Account:</label>
                    <input type="text" class="form-control" name="staff_line_account"
                        value="{{ $return->staff_line_account }}" readonly>
                </div>
                <div class="form-group">
                    <label>Department:</label>
                    <input type="text" class="form-control" name="department_id" value="{{ $return->department->department_name }}" readonly>
                </div>
                <div class="form-group">
                    <label>Title:</label>
                    <input type="text" class="form-control" name="title_id" value="{{ $return->title->title_name }}" readonly>
                </div>
                <img style="height: 200px" src="/images/profile_picture/staff/{{ $return->staff_photo }}" alt="">
                <br><br>
                <form action="{{ route('admin.staff.edit', $return) }}" method="GET">
                    @csrf
                    <button class="btn btn-normal" type="submit" style="float: left; margin-right: 10px">Edit</button>
                </form>
                <form action="{{ route('admin.staff.destroy', $return) }}" method="post">
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
