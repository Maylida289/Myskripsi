<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::insert([
           
            [
                'name' => 'Admin Aplikasi',
                'level' => 'admin-operator',
                'email' => 'admin@operator.com',
                'password' => bcrypt('admin'),
                'remember_token' => Str::random(60),
            ],
            [
                'name' => 'Admin Aplikasi',
                'level' => 'admin-admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('admin'),
                'remember_token' => Str::random(60),
            ],
            [
                'name' => 'Admin Aplikasi',
                'level' => 'admin-medical',
                'email' => 'admin@medical.com',
                'password' => bcrypt('admin'),
                'remember_token' => Str::random(60),
            ],
            [
                'name' => 'Admin Aplikasi',
                'level' => 'admin-blk',
                'email' => 'admin@blk.com',
                'password' => bcrypt('admin'),
                'remember_token' => Str::random(60),
            ],
            [
                'name' => 'Admin Aplikasi',
                'level' => 'admin-p3mi',
                'email' => 'admin@p3mi.com',
                'password' => bcrypt('admin'),
                'remember_token' => Str::random(60),
            ],
        ]);
    }
}
