<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $primaryKey = "event_id";

    protected $fillable = [
        'event',
        'type',
        'is_group',
        'event_date',
        'duration',
        'country',
        'city',
        'organizer',
        'file',
        'status',
    ];

    public function users(){
        return $this->belongsToMany(User::class, 'user_event', 'event_id', 'user_id');
    }

    public function guests(){
        return $this->belongsToMany(User::class, 'user_event', 'event_id', 'user_id')->withPivot('is_approved')->withTimeStamps();
    }
}
