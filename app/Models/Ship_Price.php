<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ship_Price extends Model
{
    use HasFactory;
    public $fillable =
    ['governate_id','costs','type_id'];
}
