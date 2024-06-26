<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'Admin@gmail.com',
            'password' => Hash::make('123456')

        ]);

        $admin->assignRole('admin');

        $kepaladinas = User::create([
            'name' => 'Kepala Dinas',
            'email' => 'KepalaDinas@gmail.com',
            'password' => Hash::make('654321')
        ]);

        $kepaladinas->assignRole('kepala dinas');
    }
}
