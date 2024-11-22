<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Permisson;

class Role extends Model
{
    use HasFactory;
    public $fillable = [
        'name',

    ];


    //! realtions on roles
    public function users(){
        return $this->hasMany(User::class);
    }

    public function permissons(){
        return $this->belongsToMany(Permisson::class);
     }
}
