<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    use HasFactory;
    protected $table = "specialities";

    public static function find($id)
    {
    }

    public function specialityCourse()
    {
        return $this->hasMany(SpecialityCourse::class, 'speciality_course_id', 'id')->withDefault();

    }
    public function baseUnitDepartment()
    {
        return $this->hasMany(baseUnits::class, 'base_unit_department_id', 'id')->withDefault();

    }

    public function courses()
    {
        return $this->hasMany(Course::class, 'course_id', 'id')->withDefault();

    }
    public function user()
    {
        return $this->hasMany(User::class, 'user_id', 'id')->withDefault();

    }
}
