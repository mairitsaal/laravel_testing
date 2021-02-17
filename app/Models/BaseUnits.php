<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseUnits extends Model
{
    use HasFactory;

    protected $table ="base_units";

    public function baseUnits()
    {
        return $this->belongsTo(\App\Models\BaseUnits::class, 'base_units_id');
    }
}
