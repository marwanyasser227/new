<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ship_Detail extends Model
{
    use HasFactory;
    public $fillable = [
        'shipment_id','numberOfShipment','details','size','type_id','cost','letClientOpenit'
    ];
}
