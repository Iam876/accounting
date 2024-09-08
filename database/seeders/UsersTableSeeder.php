<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str; 
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $roles = Role::all(); // Fetch all roles
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123'),
            'remember_token' => Str::random(10),
        ])->roles()->attach($roles->first());

        User::factory()
            ->count(10) // Create 10 users
            ->create()
            ->each(function ($user) use ($roles) {
                $user->roles()->attach($roles->random(1)); // Attach a random role to each user
            });
    }
}
