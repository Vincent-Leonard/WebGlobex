<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    use HasFactory;

    protected $primaryKey = "title_id";

    protected $fillable = [
        'title_name',
    ];

    public function staff(){
        return $this->hasMany(Staff::class);
    }

    public function lecturer(){
        return $this->hasMany(Lecturer::class);
    }
}
