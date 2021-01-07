<?php

namespace App\Http\Controllers\Lecturer;

use App\Models\User;
use App\Models\Department;
use App\Models\Title;
use App\Models\Jaka;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        $pages = 'lecturer';
        return view('lecturer.profile', compact('user', 'pages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pages = 'user';
        $departments = Department::all();
        $titles = Title::all();
        $jakas = Jaka::all();
        return view('lecturer.editProfile', compact('user', 'departments', 'titles', 'jakas', 'pages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->lecturer->update($request->except('lecturer_photo', 'email'));

        if ($request->lecturer_photo != null) {
            $data = $request->validate([
                'lecturer_photo' => 'image',
            ]);
            if ($request->has('lecturer_photo')) {
                $file_name = time() . '-' . $data['lecturer_photo']->getClientOriginalName();
                $request->lecturer_photo->move(public_path('images\profile_picture\lecturer'), $file_name);
                $user->lecturer->update([
                    'lecturer_photo' => $file_name
                ]);
            }
        }
        return redirect()->route('lecturer.user.show', $user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
