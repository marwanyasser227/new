<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    public $fillable = [
        'customer_id',
        'street',
        'landmanrk',
        'address',
        'float',
        'city_id',
        'governate_id',
        'JobAddress'
    ];
}
