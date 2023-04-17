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
use App\Rave\Rave;

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

    public function makePayment($amount, $script_id) {
        $reference = Rave::generateReference();
        $script = ScriptCollection::find($script_id);

        $payment_ref = ProcessingPayment::create([
            'reference' => $reference,
            'user_id' => $this->id,
            'script_id' => $script_id,
            'amount' => $amount
        ]);

        $rave = new Rave();

        $data = [
            'amount' => $amount,
            'email' => $this->email,
            'tx_ref' => $reference,
            'currency' => "XAF",
            'redirect_url' => route('payment_callback'),
            'customer' => [
                'email' => $this->email,
                "phone_number" => $this->phonenumber,
                "name" => $this->username
            ],

            "customizations" => [
                "title" => "Script Payment",
                "description" => "Payment for ". $script->script_title,
            ]
        ];

        $payment = $rave->initializePayment($data);

        return $payment;
    }

    // called when payment processed sucqcessfully
    public function buyScript($script_id, $amount) {
        $script = ScriptCollection::find($script_id);
        ScriptsBought::create([
            'script_id' => $script_id,
            'user_id' => $this->id,
            'amount' => $amount
        ]);
        $script->update(['is_bought' => true]);
    }
}
