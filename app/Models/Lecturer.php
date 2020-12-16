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
}
