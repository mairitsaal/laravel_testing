<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table ="courses";

    public function specialityCourse()
    {
        return $this->hasMany(SpecialityCourse::class, 'speciality_course_id', 'id')->withDefault();

    }
    public function speciality()
    {
        return $this->belongsTo(Speciality::class, 'speciality_id', 'id')->withDefault();

    }
    public function user()
    {
        return $this->hasMany(User::class, 'user_id', 'id')->withDefault();

    }
    public function requirements()
    {
        return $this->hasMany(PracticeRequirement::class, 'requirement_id', 'id')->withDefault();

    }
}
