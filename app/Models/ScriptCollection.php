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
        'copyright',
        'movie_format',
        'target_audience',
        'motivation',
        'relevance',
        'story_origin',
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

    public static function unverifiedScripts(){
        $users_role_id = Role::where('name', 'user')->first()->id;
        $all_users = User::where('role_id', $users_role_id)->get();
        $uverified_users = [];
        foreach($all_users as $user){
            if($user->scriptWriter->is_verified == false){
                $uverified_users[] = $user;
            }
        }
        
        $uverified_scripts = [];
        foreach($uverified_users as $uverified_user){
            $script = $uverified_user->scripts()->first();
            
            if($script != null){
                array_push($uverified_scripts, $script);
            }
        }

        return $uverified_scripts;
    }

    public static function approvedScripts(){
        $users_role_id = Role::where('name', 'user')->first()->id;
        $all_users = User::where('role_id', $users_role_id)->get();
        $verified_users = [];
        foreach($all_users as $user){
            if($user->scriptWriter->is_verified == true){
                $verified_users[] = $user;
            }
        }
        
        $verified_scripts = [];
        foreach($verified_users as $verified_user){
            $script = $verified_user->scripts()->first();
            
            if($script != null){
                array_push($verified_scripts, $script);
            }
        }

        return $verified_scripts;
    }
}
