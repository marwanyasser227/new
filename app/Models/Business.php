<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;
    public $fillable = [
        'street','name','isMain','city_id','governate_id','owner_id'
    ];
}
