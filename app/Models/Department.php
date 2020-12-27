<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $primaryKey = "department_id";

    protected $fillable = [
        'initial',
        'department_name'
    ];

    public function student(){
        return $this->hasMany(Student::class);
    }

    public function lecturer(){
        return $this->hasMany(Lecturer::class);
    }

    public function staff(){
        return $this->hasMany(Staff::class);
    }
}
