<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class StaffResource extends JsonResource
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
            'nidn' => $this->nidn,
            'staff_name' => $this->staff_name,
            'staff_email' => $this->staff_email,
            'description' => $this->description,
            'staff_photo' => $this->staff_photo,
            'staff_gender' => $this->staff_gender,
            'staff_phone' => $this->staff_phone,
            'staff_line_account' => $this->staff_line_account,
            'department_id' => $this->department->department_name,
            'title_id' => $this->title->title_name,
        ];
    }
}
