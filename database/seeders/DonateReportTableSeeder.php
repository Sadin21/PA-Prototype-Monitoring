<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DonateReportTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('donate_reports')->insert([
            [
                'nominal' => '100000',
                'status' => 'Diterima',
                'date' => '2021-05-12',
                'file' => 'nota.png',
                'child_id' => 1,
            ],
            [
                'nominal' => '200000',
                'status' => 'Diterima',
                'date' => '2021-05-12',
                'file' => 'nota2.jpg',
                'child_id' => 2,
            ]
        ]);
    }
}
