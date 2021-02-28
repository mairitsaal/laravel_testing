<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecialityCourse extends Model
{
    use HasFactory;
    protected $table = "speciality_courses";

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id')->withDefault();

    }
    public function speciality()
    {
        return $this->belongsTo(Speciality::class, 'speciality_id', 'id')->withDefault();

    }
}
