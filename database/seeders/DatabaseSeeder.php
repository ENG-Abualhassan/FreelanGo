<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Freelancer;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        //     'password' => Hash::make('1234'),
        // ]);
        // Admin::create([
        //     'name' => 'Test Admin',
        //     'email' => 'admin@example.com',
        //     'password' => Hash::make('1234'),
        // ]);
        // Freelancer::create([
        //     'name' => 'Test Freelancer',
        //     'email' => 'freelancer@example.com',
        //     'password' => Hash::make('1234'),
        // ]);
        // Permission::create(['name' => 'users.view' , 'guard_name' => 'admins']);
        // Permission::create(['name' => 'users.store' , 'guard_name' => 'admins']);
        // Permission::create(['name' => 'users.update' , 'guard_name' => 'admins']);
        // Permission::create(['name' => 'users.delete' , 'guard_name' => 'admins']);
        // $super = Role::create(['name' => 'super' , 'guard_name' => 'admins']);
        // $viewer = Role::create(['name' => 'viewer' , 'guard_name' => 'admins']);
        // $editor = Role::create(['name' => 'editor' , 'guard_name' => 'admins']);

        // $super->givePermissionTo(Permission::all());
        // $viewer->givePermissionTo(['users.view']);
        // $editor->givePermissionTo(['users.view' , 'users.update' , 'users.delete']);
        $user = Admin::find(1);
        // $user->assignRole('super'); // هنا تقوم باضافة الدور او الصلاحية الى المستخدم
        $user->syncRoles('viewer'); // هنا تقوم بتعديل الدور او الصلاحية للمستخدم كترقية هذا المستخدم او انزاله منزلة اقل
    }
}
