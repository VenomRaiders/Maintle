<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ScriptCollection extends Model
{
    use HasFactory;

    protected $fillable = [
        'script_writer_id',
        'document_url',
        'script_title',
        'script_synopsis',
        'script_logline',
        'script_sub_genre',
        'script_target_audience',
        'script_no_locations',
        'script_lead_roles',
        'script_cast_size',
        'poster_image',
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'script_writer_id', 'id');
    }

    public function genres(): BelongsToMany {
        return $this->belongsToMany(Genre::class, 'genre_script', 'script_id', 'genre_id');
    }

    public function subGenres(): BelongsToMany {
        return $this->belongsToMany(Genre::class, 'sub_genre_script', 'script_id', 'genre_id');
    }
}
