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
            'date' => (string) $this->event_date,
            'status' => $this->status,
            'pivot' => $this->pivot,
        ];
    }
}
