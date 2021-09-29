<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    use HasFactory;

    protected $table = 'ranks';

    protected $fillable = [
        'scholarship_id',
        'rank_date',
        'rank',
    ];

    protected $dates = [
        'rank_date'
    ];
}
