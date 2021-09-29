<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClaimSlp extends Model
{
    use HasFactory;

    protected $table = 'claims_slps';

    protected $fillable = [
        'scholarship_id',
        'claim_slp_date',
        'amount',
    ];

    protected $dates = [
        'claim_slp_date'
    ];
}
