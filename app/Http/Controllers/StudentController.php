<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        $pages = 'index';
        return view('user.student.index', compact('students', 'pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pages = 'student';
        $departments = Department::all();
        return view('user.student.addStudent', compact('departments', 'pages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'student_photo' => 'image',
        ]);

        if ($request->has('student_photo')) {
            $file_name = time() . '-' . $data['student_photo']->getClientOriginalName();
            $request->student_photo->move(public_path('images\profile_picture\student'), $file_name);
        } else {
            $file_name = null;
        }

        $student = Student::create([
            'nim' => $request->nim,
            'student_name' => $request->student_name,
            'student_email' => $request->student_email,
            'batch' => $request->batch,
            'description' => $request->description,
            'student_photo' => $file_name,
            'student_gender' => $request->student_gender,
            'student_phone' => $request->student_phone,
            'student_line_account'=> $request->student_line_account,
            'department_id' => $request->department_id,
            ]);

        $user = User::create([
            'password' => Hash::make($request['password']),
            'email' => $request['student_email'],
            'student_id' => $student->student_id,
            'role_id' => '3',
        ]);

        return redirect()->route('admin.student.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student $student
     * @return \Illuminate\Http\Response
     */
    public function show($detail)
    {
        $students = Student::all();
        $pages = 'showit';
        $return = Student::Find($detail);
        return view('user.student.index', compact('students', 'return', 'pages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $pages = 'student';
        $departments = Department::all();
        return view('user.student.editStudent', ['model' => $student], compact('student', 'departments', 'pages'));
    }

    /*
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $student->update($request->except('student_photo', 'email', 'is_admin'));
        $student->user->update([
            'is_admin' => $request->is_admin
        ]);

        if ($request->student_photo != null) {
            $data = $request->validate([
                'student_photo' => 'image',
            ]);
            if ($request->has('student_photo')) {
                $file_name = time() . '-' . $data['student_photo']->getClientOriginalName();
                $request->student_photo->move(public_path('images\profile_picture\student'), $file_name);
                $student->update([
                    'student_photo' => $file_name
                ]);
            }
        }
        return redirect()->route('admin.student.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->user->delete();
        $student->delete();
        return redirect()->route('admin.student.index');
    }
}




