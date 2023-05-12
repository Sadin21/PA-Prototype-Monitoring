<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChildParentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('child_parents')->insert([
            [
                'name' => 'Budi',
                'birth_place' => 'Jakarta',
                'birth_date' => '1990-01-01',
                'marital' => 'Married',
                'tertiary_education' => 'S1',
                'address' => 'Jl. Jalan Anggrek',
                'job' => 'PNS',
                'phone' => '081234567890',
                'salary' => '10000000',
                'home_status' => 'Rented',
                'number_of_souls' => '4',
                'category_of_souls' => 'Poor',
            ],
            [
                'name' => 'Siti',
                'birth_place' => 'Jakarta',
                'birth_date' => '1990-01-01',
                'marital' => 'Married',
                'tertiary_education' => 'SMA',
                'address' => 'Jl. Jalan Kenangan',
                'job' => 'PNS',
                'phonr' => '081234567890',
                'salary' => '10000000',
                'home_status' => 'Rented',
                'number_of_souls' => '5',
                'category_of_souls' => 'Poor',
            ]
        ]);
    }
}
