<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'nama' => 'Admin HRD',
                'email' => 'admin@company.com',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'created_at' => now()
            ],
            [
                'nama' => 'Karyawan 1',
                'email' => 'karyawan1@company.com',
                'password' => Hash::make('password1'),
                'role' => 'karyawan',
                'created_at' => now()
            ]
        ]);
    }
}
