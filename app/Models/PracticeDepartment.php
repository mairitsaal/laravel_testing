<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PracticeDepartment extends Model
{
    use HasFactory;

    protected $table = "practice_departments";

    public function practiceUnit()
    {
        return $this->belongsTo(PracticeUnit::class, 'practice_unit_id', 'id')
            ->withDefault();
    }
    public function practiceInstructors()
    {
        return $this->hasMany(PracticeInstructor::class, 'practice_instructor_id', 'id')->withDefault();

    }
    public function baseUnitDepartment()
    {
        return $this->hasMany(BaseUnitDepartment::class, 'base_unit_department_id', 'id')->withDefault();

    }
    public function unitDeps()
    {
        return $this->hasMany(BaseUnits::class, 'base_units_id', 'id')->withDefault();

    }
    public function users()
    {
        return $this->hasMany(User::class, 'user_id', 'id')->withDefault();
    }
}
