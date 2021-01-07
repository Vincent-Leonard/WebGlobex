<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\User;
use App\Models\Department;
use App\Models\Title;
use App\Models\Jaka;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffs = Staff::all();
        $pages = 'staff';
        return view('user.staff.index', compact('staffs', 'pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pages = 'staff';
        $departments = Department::all();
        $titles = Title::all();
        $jakas = Jaka::all();
        return view('user.staff.addStaff', compact('departments', 'titles', 'jakas', 'pages'));
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
            'staff_photo' => 'image',
        ]);

        if ($request->has('staff_photo')) {
            $file_name = time() . '-' . $data['staff_photo']->getClientOriginalName();
            $request->staff_photo->move(public_path('images\profile_picture\staff'), $file_name);
        } else {
            $file_name = null;
        }

        $staff = staff::create([
            'nip' => $request->nim,
            'nidn' => $request->nidn,
            'staff_name' => $request->staff_name,
            'staff_email' => $request->email,
            'description' => $request->description,
            'staff_photo' => $file_name,
            'staff_gender' => $request->staff_gender,
            'staff_phone' => $request->staff_phone,
            'staff_line_account'=> $request->staff_line_account,
            'department_id' => $request->department_id,
            'title_id' => $request->title_id,
            'jaka_id' => $request->jaka_id,
        ]);

        $user = User::create([
            'password' => Hash::make($request['password']),
            'email' => $request->email,
            'staff_id' => $staff->staff_id,
            'role_id' => '1',
        ]);

        return redirect()->route('admin.staff.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pages = 'staff';
        $staff = Staff::findOrFail($id);
        $departments = Department::findOrFail($staff->department_id);
        $titles = Title::findOrFail($staff->title_id);
        return view('user.staff.profile', compact('departments', 'titles', 'staff', 'pages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function edit(Staff $staff)
    {
        $pages = 'staff';
        $departments = Department::all();
        $titles = Title::all();
        $jakas = Jaka::all();
        return view('user.staff.editStaff', ['model' => $staff], compact('staff', 'departments', 'titles', 'jakas', 'pages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Staff $staff)
    {
        $staff->update($request->except('staff_photo', 'email', 'is_admin'));
        $staff->user->update([
            'is_admin' => $request->is_admin
        ]);

        if ($request->staff_photo != null) {
            $data = $request->validate([
                'staff_photo' => 'image',
            ]);
            if ($request->has('staff_photo')) {
                $file_name = time() . '-' . $data['staff_photo']->getClientOriginalName();
                $request->staff_photo->move(public_path('images\profile_picture\staff'), $file_name);
                $staff->update([
                    'staff_photo' => $file_name
                ]);
            }
        }
        return redirect()->route('admin.staff.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staff $staff)
    {
        $staff->user->delete();
        $staff->delete();
        return redirect()->route('admin.staff.index');
    }
}
