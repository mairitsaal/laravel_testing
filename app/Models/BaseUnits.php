<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseUnits extends Model
{
    use HasFactory;

    protected $table ="base_units";

    //public function baseUnits()
    //{
    //    return $this->belongsTo(\App\Models\BaseUnits::class, 'base_units_id');
    //}

    public function practiceDepartments()
    {
        return $this->hasMany(PracticeDepartment::class, 'practice_department_id', 'id')->withDefault();

    }

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

}
