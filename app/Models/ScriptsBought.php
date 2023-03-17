<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScriptsBought extends Model
{
    use HasFactory;

    protected $fillable = [
        'script_id',
        'user_id',
        'amount'
    ];
}
