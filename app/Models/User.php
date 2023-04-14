<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'phone_number',
        'profile_pic_url',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(): BelongsTo {
        return $this->belongsTo(Role::class);
    }

    public function scriptWriter(): HasOne {
        return $this->hasOne(ScriptWriter::class);
    }

    public function scripts(): HasMany {
        return $this->hasMany(ScriptCollection::class, 'script_writer_id');
    }

    public function is_admin(): bool {
        return $this->role->name === "admin";
    }
    
    public function is_investor(): bool {
        return $this->role->name === "investor";
    }

    static public function allVerifiedScriptWriters() {
        $script_writers_role_id = Role::where('name', 'user')->first()->id;
        $script_writers = User::where('role_id', $script_writers_role_id)->with('scriptWriter')->get();

        return $script_writers;
    }
}
