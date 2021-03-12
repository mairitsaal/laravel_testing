<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    //protected $table = "users";
    protected $guard = "users";

    protected $fillable = [
        'name',
        'phone',
        'email',
        'usertype',
        'position',
        'course_id',
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
    public function practiceBases()
    {
        return $this->belongsTo(PracticeBase::class, 'practice_base_id', 'id')
            ->withDefault();
    }
    public function practiceUnits()
    {
        return $this->belongsTo(PracticeUnit::class, 'practice_unit_id', 'id')
            ->withDefault();
    }
    public function practiceDepartments()
    {
        return $this->belongsTo(PracticeDepartment::class, 'practice_department_id', 'id')
            ->withDefault();
    }
    public function baseUnitDepartments()
    {
        return $this->belongsTo(BaseUnitDepartment::class, 'base_unit_department_id', 'id')->withDefault();

    }
    public function specialities()
    {
        return $this->belongsTo(Speciality::class, 'speciality_id', 'id')->withDefault();

    }
    public function courses()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id')->withDefault();

    }
    public function specialityCourses()
    {
        return $this->belongsTo(SpecialityCourse::class, 'speciality_course_id', 'id')->withDefault();

    }
}
