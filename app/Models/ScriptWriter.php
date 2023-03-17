<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
