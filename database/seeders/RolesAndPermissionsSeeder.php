<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{

    public function run()
    {
        // Temporarily disable foreign key checks
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Clear existing roles and permissions to avoid duplication
        Role::query()->delete();
        Permission::query()->delete();

        // Re-enable foreign key checks
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        // Clear existing roles and permissions to avoid duplication

        // Define permissions
        $permissions = [
            // Dashboard Permissions
            'view dashboard',
            'create dashboard',
            'edit dashboard',
            'delete dashboard',
            'generate database',
            'view billing',
            'view total amount',
            'view amount due',

            // School Module Permissions
            'view school',
            'create school',
            'edit school',
            'delete school',

            // Apartment Module Permissions
            'view apartment',
            'create apartment',
            'edit apartment',
            'delete apartment',
            'add apartment rooms',
            'edit apartment rooms',

            // Students Module Permissions
            'view student',
            'create student',
            'edit student',
            'delete student',

            // PIC Company Module Permissions
            'view pic company',
            'create pic company',
            'edit pic company',
            'delete pic company',

            // Billing Methods Permissions
            'view billing method',
            'create billing method',
            'edit billing method',
            'delete billing method',

            // Package Selection Permissions
            'view package',
            'create package',
            'edit package',
            'delete package',

            // Roles Permissions
            'view role',
            'create role',
            'edit role',
            'delete role',

            // Billing Management Permissions
            'edit billing',
            'delete billing',
            'view billing history',
            'track all student billings',

            // Messaging Permissions
            'view message',

            // User Management Permissions
            'view user',
            'create user',
            'edit user',
            'delete user',
        ];

        // Create each permission
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Define roles and assign existing permissions
        $roles = [
            'Admin' => Permission::all(),
            'Editor' => ['view dashboard', 'edit dashboard', 'view school'],
            'Viewer' => ['view dashboard', 'view school', 'view apartment']
        ];

        foreach ($roles as $roleName => $rolePermissions) {
            // Use firstOrCreate to avoid duplicates
            $role = Role::firstOrCreate(['name' => $roleName]);

            // Assign permissions to the role
            if ($rolePermissions instanceof \Illuminate\Support\Collection) {
                $role->syncPermissions($rolePermissions); // Admin has all permissions
            } else {
                $role->syncPermissions($rolePermissions); // Editor and Viewer have specific permissions
            }
        }
    }
}
