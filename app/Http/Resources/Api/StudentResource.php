<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
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
            'nim' => $this->nim,
            'student_name' => $this->student_name,
            'student_email' => $this->student_email,
            'batch' => $this->batch,
            'description' => $this->description,
            'student_photo' => $this->student_photo,
            'student_gender' => $this->student_gender,
            'student_phone' => $this->student_phone,
            'student_line_account' => $this->student_line_account,
            'department_id' => $this->department->department_name,
        ];
    }
}
