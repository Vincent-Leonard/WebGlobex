<?php

namespace App\Http\Controllers\student;

use App\Models\Lecturer;
use App\Models\User;
use App\Models\Department;
use App\Models\Title;
use App\Models\Jaka;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LecturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lecturers = Lecturer::all();
        $pages = 'lecturer';
        return view('user.lecturer.index', compact('lecturers', 'pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pages = 'lecturer';
        $departments = Department::all();
        $titles = Title::all();
        $jakas = Jaka::all();
        return view('user.lecturer.addLecturer', compact('departments', 'titles', 'jakas', 'pages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lecturer = Lecturer::create($request->except(['password']));
        User::create([
            'password' => Hash::make($request['password']),
            'email' => $request['email'],
            'lecturer_id' => $lecturer->lecturer_id,
        ]);
        return redirect()->route('lecturer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pages = 'lecturer';
        $lecturer = Lecturer::findOrFail($id);
        $departments = Department::findOrFail($lecturer->department_id);
        $titles = Title::findOrFail($lecturer->title_id);
        $jakas = Jaka::findOrFail($lecturer->jaka_id);
        return view('user.lecturer.profile', compact('departments', 'titles', 'jakas', 'lecturer', 'pages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function edit(Lecturer $lecturer)
    {
        $pages = 'lecturer';
        $departments = Department::all();
        $titles = Title::all();
        $jakas = Jaka::all();
        return view('user.lecturer.editLecturer', ['model' => $lecturer], compact('lecturer', 'departments', 'titles', 'jakas', 'pages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lecturer $lecturer)
    {
        $lecturer->update($request->all());
        return redirect()->route('lecturer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lecturer $lecturer)
    {
        $lecturer->delete();
        return redirect()->route('lecturer.index');
    }
}
