<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChildrenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('children')->insert([
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
                'coordinator_id' => 3,
                'child_parent_id' => 2,
            ]
            ]);
    }
}
