<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitDeps extends Model
{
    use HasFactory;

    protected $table = "unit_deps";

    public function practiceUnits()
    {
        return $this->belongsTo(PracticeUnit::class, 'practice_unit_id', 'id')->withDefault();
    }

    public function practiceDepartments()
    {
        return $this->belongsTo(PracticeDepartment::class, 'practice_department_id', 'id')->withDefault();

    }
}
