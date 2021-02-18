<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PracticeInstructor extends Model
{
    use HasFactory;

    protected $table = "practice_instructors";

    public function practiceBase()
    {
        return $this->belongsTo(PracticeBase::class, 'practice_base_id', 'id')
            ->withDefault();
    }
    public function practiceUnit()
    {
        return $this->belongsTo(PracticeUnit::class, 'practice_unit_id', 'id')
            ->withDefault();
    }
    public function practiceDepartment()
    {
        return $this->belongsTo(PracticeDepartment::class, 'practice_department_id', 'id')
            ->withDefault();
    }
}


