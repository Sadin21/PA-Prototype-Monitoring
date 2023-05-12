<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'role_id' => '1',
                'email' => 'admin@admin.com',
                'password' => bcrypt('123'),
                'phone' => '',
                'address' => '',
                'photo' => '',
                'remember_token' =>Str::random(60)
            ],
            [
                'name' => 'Ismail Marzuki',
                'role_id' => '2',
                'email' => 'koor@koor.com',
                'password' => bcrypt('123'),
                'phone' => '081267789345',
                'address' => 'Jl. Sukolilo, Surabaya',
                'photo' => 'foto 1.jpg',
                'remember_token' =>Str::random(60)
            ],
            [
                'name' => 'Ahmad Sanusi',
                'role_id' => '2',
                'email' => 'koor2@koor.com',
                'password' => bcrypt('123'),
                'phone' => '081267789346',
                'address' => 'Jl. Sukolilo, Surabaya',
                'photo' => 'foto 2.jpeg',
                'remember_token' =>Str::random(60)
            ],
            [
                'name' => 'Muzakki',
                'role_id' => '2',
                'email' => 'koor3@koor.com',
                'password' => bcrypt('123'),
                'phone' => '081267789347',
                'address' => 'Jl. Sukolilo, Surabaya',
                'photo' => 'foto 3.png',
                'remember_token' =>Str::random(60)
            ]
        ]);
    }
}
