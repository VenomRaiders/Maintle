<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcessingPayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference',
        'user_id',
        'script_id',
        'amount',
        'status'
    ];
}
