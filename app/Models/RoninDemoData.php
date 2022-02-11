<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoninDemoData extends Model
{
    use HasFactory;

    protected $table = 'ronin_demo_data';

    protected $fillable = [
        'ronin_id'
    ];
}
