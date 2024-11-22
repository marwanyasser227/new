<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pilot_Detail extends Model
{
    use HasFactory;
    public $fillable = [
        'pilot_id',
        'liscense',
    ];
}
