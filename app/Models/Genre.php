<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Genre extends Model
{
    use HasFactory;

    protected $fillable = [
        'genre',
    ];

    public function scripts(): BelongsToMany {
        return $this->belongsToMany(ScriptCollection::class, 'genre_script', 'genre_id', 'script_id');
    }

    public function projects(): BelongsToMany {
        return $this->belongsToMany(Project::class);
    }
}
