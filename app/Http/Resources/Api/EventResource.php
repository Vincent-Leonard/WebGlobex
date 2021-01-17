<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class EventResource extends JsonResource
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
            'event_id' => $this->event_id,
            'event' => $this->event,
            'type' => $this->type,
            'duration' => $this->duration,
            'is_group' => $this->is_group,
            'event_date' => (string) $this->event_date,
            'country' => $this->country,
            'city' => $this->city,
            'organizer' => $this->organizer,
            'file' => $this->file,
            'status' => $this->status,
            'pivot' => $this->pivot,
        ];
    }
}
