<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class LecturerResource extends JsonResource
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
            'nip' => $this->nip,
            'nidn' => $this->nidn,
            'lecturer_name' => $this->lecturer_name,
            'lecturer_email' => $this->lecturer_email,
            'description' => $this->description,
            'lecturer_photo' => $this->lecturer_photo,
            'lecturer_gender' => $this->lecturer_gender,
            'lecturer_phone' => $this->lecturer_phone,
            'lecturer_line_account' => $this->lecturer_line_account,
            'department_id' => $this->department->department_name,
            'title_id' => $this->title->title_name,
            'jaka_id' => $this->jaka->jaka_name,
        ];
    }
}
