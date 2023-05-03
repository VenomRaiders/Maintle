<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investor extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'previous_productions',
        'number_of_productions',
        'links_to_trailers',
        'work_in_production_company',
        'work_in_production_company_details',
        'own_production_company',
        'own_production_company_details',
        'independent_investor',
        'independent_investor_details'
    ];

    function user () {
        return $this->belongsTo(User::class);
    }
}
