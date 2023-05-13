<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Child;

class ChildrenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $children = [
            [
                'name' => 'Ahmad Fauzi',
                'gender' => 'Laki-laki',
                'birth_date' => '2015-01-01',
                'birth_place' => 'Surabaya',
                'status_in_family' => 'Yatim',
                'grade' => 'TK',
                'class' => 'A',
                'school' => 'TK Amanah',
                'status_with_parents' => 'Orang Tua',
                'photo' => 'anak.jpeg',
                'regis_status' => 'Pengajuan',
                'coordinator_id' => 2,
                'child_parent_id' => 1,
            ],
            [
                'name' => 'Syafira Aulia',
                'gender' => 'Perempuan',
                'birth_date' => '2015-01-01',
                'birth_place' => 'Surabaya',
                'status_in_family' => 'Yatim',
                'grade' => 'SD',
                'class' => '2',
                'school' => 'SD Amanah',
                'status_with_parents' => 'Orang Tua',
                'photo' => 'anak 2.webp',
                'regis_status' => 'Pengajuan',
                'coordinator_id' => 3,
                'child_parent_id' => 2,
            ]
        ];

        foreach ($children as $child) {
            // buat akun

            $dataUser = User::create([
                'name' => $child['name'],
                'email' => strtolower(str_replace(' ', '', $child['name'])) . '@gmail.com',
                'password' => bcrypt('123'),
                'role_id' => 3,
                'remember_token' => Str::random(60)
            ]);

            $child['user_id'] = $dataUser->id;
            Child::create($child);

        }
        // DB::table('children')->insert($children);
    }
}
