<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::factory(1)->create([
            "name"=> "Admin",
        ]);
        Role::factory(1)->create([
            "name"=> "User",
        ]);
        User::factory(1)->create([
            "name"=> "Esmail",
            "role_id" => "1",
            "email"=> "admin@blogwebsite.com",
            "password"=> bcrypt("123123123"),
        ]);
        User::factory(1)->create([
            "name"=> "Ali",
            "role_id" => "2",
            "email"=> "user@blogwebsite.com",
            "password"=> bcrypt("123123123"),
        ]);
    }
}
