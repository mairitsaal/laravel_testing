<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PracticeBase extends Model
{
    use HasFactory;

    protected $table ="practice_bases";

    public function practiceUnits()
    {
        return $this->hasMany(PracticeUnit::class, 'practice_unit_id', 'id')->withDefault();

    }
    public function practiceInstructors()
    {
        return $this->hasMany(PracticeInstructor::class, 'practice_instructor_id', 'id')->withDefault();

    }
    public function baseUnits()
    {
        return $this->hasMany(baseUnits::class, 'base_units_id', 'id')->withDefault();

    }
    public function baseUnitDepartment()
    {
        return $this->hasMany(baseUnits::class, 'base_unit_department_id', 'id')->withDefault();

    }
}
