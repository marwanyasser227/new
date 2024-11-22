<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;
    public $fillable = [
        'customer_id','bussiness_id','hub_id','pilot_id','status'
    ];
}
