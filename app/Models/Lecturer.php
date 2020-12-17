<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    use HasFactory;
    protected $fillable = [
        'nip',
        'nidn',
        'lecturer_name',
        'lecturer_email',
        'description',
        'lecturer_photo',
        'lecturer_gender',
        'lecturer_phone',
        'lecturer_line_account',
    ];

    public function department(){
        return $this->belongsTo(Department::class, 'department_id', 'department_id');
    }

    public function title(){
        return $this->belongsTo(Department::class, 'department_id', 'department_id');
    }

    public function jaka(){
        return $this->belongsTo(Department::class, 'department_id', 'department_id');
    }
}
