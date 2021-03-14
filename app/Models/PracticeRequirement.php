<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PracticeRequirement extends Model
{
    use HasFactory;

    protected $table = 'requirements';
    protected $fillable = [
        'nimi',
        'course_id',
        'maht',
        'kirjeldus',
        'esimenePaevKaasa',
    ];

    public function courses()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id')->withDefault();

    }

}
