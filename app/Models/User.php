<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'password',
        'role_id',
        'is_login',
        'is_admin',
        'student_id',
        'lecturer_id',
        'staff_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function roles(){
    //     return $this->belongsToMany(Role::class);
    // }

    public function role(){
        return $this->belongsTo(Role::class, 'role_id', 'role_id');
    }

    public function events(){
        return $this->belongsToMany(Event::class, 'user_event', 'user_id', 'event_id');
    }

    public function attends(){
        return $this->belongsToMany(Event::class, 'user_event', 'user_id', 'event_id')->withPivot('is_approved')->withTimestamps();
    }

    public function student(){
        return $this->belongsTo(Student::class, 'student_id', 'student_id');
    }

    public function lecturer(){
        return $this->belongsTo(Lecturer::class, 'lecturer_id', 'lecturer_id');
    }

    public function staff(){
        return $this->belongsTo(Staff::class, 'staff_id', 'staff_id');
    }

    public function isStaff() {
        if($this->role->role_name == 'Staff' && $this->is_login == '1'){
            return true;
        }
        return false;
    }

    public function isLecturer() {
        if($this->role->role_name == 'Lecturer' && $this->is_login == '1'){
            return true;
        }
        return false;
    }

    public function isStudent() {
        if($this->role->role_name == 'Student' && $this->is_login == '1'){
            return true;
        }
        return false;
    }

    public function isAdmin() {
        if($this->is_admin == '1' && $this->is_login == '1'){
            return true;
        }
        return false;
    }
}
