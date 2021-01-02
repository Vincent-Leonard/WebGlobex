<?php

namespace App\Http\Controllers\staff;

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
        $pages = 'student';
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
        $student = Student::create($request->except(['password']));
        User::create([
            'password' => Hash::make($request['password']),
            'email' => $request['email'],
            'student_id' => $student->student_id,
        ]);

        return redirect()->route('student.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student $student
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pages = 'student';
        $student = Student::findOrFail($id);
        $departments = Department::findOrFail($student->department_id);

        return view('user.student.profile', compact('departments', 'student', 'pages'));
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
        $student->update($request->all());
        return redirect()->route('student.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('student.index');
    }
}
