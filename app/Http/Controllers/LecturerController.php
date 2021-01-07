<?php

namespace App\Http\Controllers;

use App\Models\Lecturer;
use App\Models\User;
use App\Models\Department;
use App\Models\Title;
use App\Models\Jaka;
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
        $data = $request->validate([
            'lecturer_photo' => 'image',
        ]);

        if ($request->has('lecturer_photo')) {
            $file_name = time() . '-' . $data['lecturer_photo']->getClientOriginalName();
            $request->lecturer_photo->move(public_path('images\profile_picture\lecturer'), $file_name);
        } else {
            $file_name = null;
        }

        $lecturer = Lecturer::create([
            'nip' => $request->nip,
            'nidn' => $request->nidn,
            'lecturer_name' => $request->lecturer_name,
            'lecturer_email' => $request->email,
            'description' => $request->description,
            'lecturer_photo' => $file_name,
            'lecturer_gender' => $request->lecturer_gender,
            'lecturer_phone' => $request->lecturer_phone,
            'lecturer_line_account'=> $request->lecturer_line_account,
            'department_id' => $request->department_id,
            'title_id' => $request->title_id,
            'jaka_id' => $request->jaka_id,
        ]);

        $user = User::create([
            'password' => Hash::make($request['password']),
            'email' => $request->email,
            'lecturer_id' => $lecturer->lecturer_id,
            'role_id' => '2',
        ]);

        return redirect()->route('admin.lecturer.index');
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
        $lecturer->update($request->except('lecturer_photo', 'email', 'is_admin'));
        $lecturer->user->update([
            'is_admin' => $request->is_admin
        ]);

        if ($request->lecturer_photo != null) {
            $data = $request->validate([
                'lecturer_photo' => 'image',
            ]);
            if ($request->has('lecturer_photo')) {
                $file_name = time() . '-' . $data['lecturer_photo']->getClientOriginalName();
                $request->lecturer_photo->move(public_path('images\profile_picture\lecturer'), $file_name);
                $lecturer->update([
                    'lecturer_photo' => $file_name
                ]);
            }
        }
        return redirect()->route('admin.lecturer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lecturer $lecturer)
    {
        $lecturer->user->delete();
        $lecturer->delete();
        return redirect()->route('admin.lecturer.index');
    }
}
