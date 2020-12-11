<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'mahasiswa_id',
        'nim',
        'nama',
        'email',
        'angkatan',
        'keterangan',
        'passfoto',
        'prodi_id',
    ];
}
