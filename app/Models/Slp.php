<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slp extends Model
{
    use HasFactory;

    protected $table = 'slps';

    protected $fillable = [
        'scholarship_id',
        'slp_date',
        'amount',
    ];

    protected $dates = [
        'slp_date'
    ];
}
