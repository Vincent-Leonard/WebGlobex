<?php

namespace App\Http\Controllers\staff;

use App\Models\Staff;
use App\Models\User;
use App\Models\Department;
use App\Models\Title;
use App\Models\Jaka;
use App\Http\Controllers\Controller;
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
        $staff = Staff::create($request->except(['password']));
        User::create([
            'password' => Hash::make($request['password']),
            'email' => $request['email'],
            'staff_id' => $staff->staff_id,
        ]);
        return redirect()->route('staff.index');
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
        $staff->update($request->all());
        return redirect()->route('staff.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staff $staff)
    {
        $staff->delete();
        return redirect()->route('staff.index');
    }
}
