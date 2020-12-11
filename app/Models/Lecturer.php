<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    use HasFactory;
    protected $fillable = [
        'dosen_id',
        'nip',
        'nidn',
        'nama',
        'email',
        'keterangan',
        'passfoto',
        'prodi_id',
        'jabatan_id',
        'jaka_id',
    ];
}
