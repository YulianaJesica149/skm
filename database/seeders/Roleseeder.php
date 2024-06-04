<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Roleseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::updateOrCreate(
            ['name' => 'admin'],
            ['guard_name' => 'web']
        );
        Role::updateOrCreate(
            ['name' => 'kepala dinas'],
            ['guard_name' => 'web']
        );
        Role::updateOrCreate(
            ['name' => 'guest'],
            ['guard_name' => 'web']
        );

        Permission::updateOrCreate(['name' => 'view_service']);
        Permission::updateOrCreate(['name' => 'create_service']);
        Permission::updateOrCreate(['name' => 'edit_service']);
        Permission::updateOrCreate(['name' => 'delete_service']);

        Permission::updateOrCreate(['name' => 'view_question']);
        Permission::updateOrCreate(['name' => 'create_question']);
        Permission::updateOrCreate(['name' => 'edit_question']);
        Permission::updateOrCreate(['name' => 'delete_question']);

        Permission::updateOrCreate(['name' => 'view_option']);
        Permission::updateOrCreate(['name' => 'create_option']);
        Permission::updateOrCreate(['name' => 'edit_option']);
        Permission::updateOrCreate(['name' => 'delete_option']);

        Permission::updateOrCreate(['name' => 'view_respondent']);
        Permission::updateOrCreate(['name' => 'create_respondent']);
        Permission::updateOrCreate(['name' => 'edit_respondent']);
        Permission::updateOrCreate(['name' => 'delete_respondent']);

        Permission::updateOrCreate(['name' => 'view_result']);

        $role_admin = Role::findByName('admin');
        $role_admin->givePermissionTo('view_service');
        $role_admin->givePermissionTo('create_service');
        $role_admin->givePermissionTo('edit_service');
        $role_admin->givePermissionTo('delete_service');

        $role_admin->givePermissionTo('view_question');
        $role_admin->givePermissionTo('create_question');
        $role_admin->givePermissionTo('edit_question');
        $role_admin->givePermissionTo('delete_question');

        $role_admin->givePermissionTo('view_option');
        $role_admin->givePermissionTo('create_option');
        $role_admin->givePermissionTo('edit_option');
        $role_admin->givePermissionTo('delete_option');

        $role_admin->givePermissionTo('view_respondent');
        $role_admin->givePermissionTo('create_respondent');
        $role_admin->givePermissionTo('edit_respondent');
        $role_admin->givePermissionTo('delete_respondent');

        $role_admin->givePermissionTo('view_result');

        $role_admin = Role::findByName('kepala dinas');
        $role_admin->givePermissionTo('view_service');
        $role_admin->givePermissionTo('view_question');
        $role_admin->givePermissionTo('view_option');
        $role_admin->givePermissionTo('view_respondent');
        $role_admin->givePermissionTo('view_result');

        $role_admin = Role::findByName('guest');
        $role_admin->givePermissionTo('create_respondent');
    }


}
