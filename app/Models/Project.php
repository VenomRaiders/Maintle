<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "logline",
        "synopsis",
        "movie_format",
        "lead_cast",
        "crew"
    ];

    public function genres(): BelongsToMany {
        return $this->belongsToMany(Genre::class);
    }
}
