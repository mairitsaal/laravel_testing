<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PracticeGroup extends Model
{
    use HasFactory;
    protected $table ="practice_groups";
    protected $fillable = [
        'nimi',
        'user_id',
        ];

    public function users()
    {
        return $this->hasMany(User::class, 'user_id', 'id')->withDefault();
    }
}
