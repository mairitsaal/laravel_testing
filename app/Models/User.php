<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = "users";
    protected $fillable = [
        'name',
        'phone',
        'email',
        'usertype',
        'password',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    //public function practiceInstructors()
    //{
    //    return $this->hasMany(PracticeInstructor::class, 'practice_instructor_id', 'id')->withDefault();

    //}
    public function practiceInstructors()
    {
        return $this->belongsTo(PracticeInstructor::class, 'practice_instructor_id', 'id')
            ->withDefault();
    }

}
