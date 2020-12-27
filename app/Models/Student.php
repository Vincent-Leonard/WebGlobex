<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $primaryKey = "student_id";

    protected $fillable = [
        'nim',
        'student_name',
        'student_email',
        'batch',
        'description',
        'student_photo',
        'student_gender',
        'student_phone',
        'student_line_account',
        'department_id',
    ];

    public function department(){
        return $this->belongsTo(Department::class, 'department_id', 'department_id');
    }

    public function user(){
        return $this->hasMany(User::class);
    }
}
