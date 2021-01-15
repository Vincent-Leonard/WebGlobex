<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Api\StudentResource;
use App\Http\Resources\Api\LecturerResource;
use App\Http\Resources\Api\StaffResource;
use Illuminate\Support\Facades\Auth;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'email' => $this->email,
            'role' => $this->role_id,
            'is_admin' => $this->is_admin,
            'is_login' => $this->is_login,
            'student' => StudentResource::make($this->student),
            'lecturer' => LecturerResource::make($this->lecturer),
            'staff' => StaffResource::make($this->staff),
            // 'department' => $this->when(Auth::user()->student(), $this->student->department->department_name),
            // 'department' => $this->when(Auth::user()->lecturer(), $this->lecturer->department->department_name),
            // 'department' => $this->when(Auth::user()->staff(), $this->staff->department->department_name),
        ];
    }
}
