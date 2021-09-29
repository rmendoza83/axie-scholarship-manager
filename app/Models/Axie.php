<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Axie extends Model
{
    use HasFactory;

    protected $table = 'axies';

    protected $fillable = [
        'scholarship_id',
        'name',
        'axie_id',
    ];
}
