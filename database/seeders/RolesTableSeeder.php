<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        // Create roles
        Role::create(['roles_name' => 'admin']);
        Role::create(['roles_name' => 'manager']);
        Role::create(['roles_name' => 'marketer']);
        Role::create(['roles_name' => 'accountant']);
        Role::create(['roles_name' => 'blogger']);
    }
}
