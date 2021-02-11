<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PracticeBase extends Model
{
    use HasFactory;

    protected $table ="practice_bases";

    public function BaseAndUnit()
    {
        return $this->hasMany('App\Models\PracticeUnit', 'practiceUnit_id', 'id');
    }
}
