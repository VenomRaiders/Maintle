<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScriptCollection extends Model
{
    use HasFactory;

    protected $fillable = [
        'script_writer_id',
        'document_script_name',
        'script_title',
        'script_synopsis',
        'script_genre',
        'script_tagline',
        'script_sub_genre',
        'script_target_audience',
        'script_no_locations',
        'script_suggested_cast',
        'poster_image',
    ];
}
