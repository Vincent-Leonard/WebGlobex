<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $table = 'staffs';

    protected $primaryKey = "staff_id";

    protected $fillable = [
        'nidn',
        'staff_name',
        'staff_email',
        'description',
        'staff_photo',
        'staff_gender',
        'staff_phone',
        'staff_line_account',
        'department_id',
        'title_id',
    ];

    public function department(){
        return $this->belongsTo(Department::class, 'department_id', 'department_id');
    }

    public function title(){
        return $this->belongsTo(Title::class, 'title_id', 'title_id');
    }

    public function user(){
        return $this->hasMany(User::class);
    }
}
