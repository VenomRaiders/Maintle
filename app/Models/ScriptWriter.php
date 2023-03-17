<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScriptWriter extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_of_birth',
        'age',
        'city',
        'gender',
        'bio',
    ];
}
