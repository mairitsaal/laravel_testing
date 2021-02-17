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

}
