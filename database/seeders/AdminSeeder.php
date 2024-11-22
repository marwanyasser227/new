<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserDeatil;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'id' => 5,
            "name"=>"admin",
            "email"=>"admin@gmail.com",
            "role_id"=>1,
            "password"=>Hash::make("123456")

        ]);

        UserDeatil::Create([
            'user_id' => 5,
            'Fimage' => 1,
            'age' => 1,
            'phone' =>2
        ]);

        // User::factory()->count(10)->make();
        }
}
