<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class PracticeUnit extends Model
{
    use HasFactory;

    protected $table = "practice_units";

    public function practiceBase()
    {
        return $this->belongsTo(PracticeBase::class, 'practice_base_id', 'id')
            ->withDefault();
    }

    public function practiceDepartments()
    {
        return $this->hasMany(PracticeDepartment::class, 'practice_department_id', 'id')->withDefault();

    }

    public function practiceInstructors()
    {
        return $this->hasMany(PracticeInstructor::class, 'practice_instructor_id', 'id')->withDefault();

    }
    //public function baseUnits()
    //{
    //    return $this->hasMany(baseUnits::class, 'base_units_id', 'id')->withDefault();

    //}
    public function baseUnitDepartment()
    {
        return $this->hasMany(baseUnits::class, 'base_unit_department_id', 'id')->withDefault();

    }
}
