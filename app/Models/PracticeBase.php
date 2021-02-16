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
}
