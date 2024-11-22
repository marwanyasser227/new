<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\AdminSeeder;
use Database\Seeders\RoleSeeder;
use App\Models\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         $this->call([ RoleSeeder::class , AdminSeeder::class ]);
        //  $this->call([ AdminSeeder::class ]);
        // User::factory(25)->make();
        // \App\Models\User::factory(10)->make();

        // \App\Models\User::factory()->create([
        //     'name' => faker()->name(),
        //     'email' => 'test@example.com',
        // ]);
    }
}
