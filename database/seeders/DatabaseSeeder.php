<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();
        $roles = [['name' => 'کاربر عادی'], ['name' => 'ادمین'], ['name' => 'کاربر برنز'], ['name' => 'کاربر نقره'], ['name' => 'کاربر طلا']];
        foreach ($roles as $role)
            Role::create($role);

        $permissions = [['name' => 'create-role'],
            ['name' => 'update-role'],
            ['name' => 'delete-role'],
            ['name' => 'create-permission'],
            ['name' => 'edit-permission'],
            ['name' => 'remove-permission'],];
        foreach ($permissions as $permission)
            Permission::create($permission);
    }
}
