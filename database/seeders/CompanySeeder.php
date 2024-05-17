<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            [
                'name' => 'SMPN 1 Kotabaru',
            ],
            [
                'name' => 'SMPN 2 Kotabaru',
            ],
            [
                'name' => 'SMPN 4 Kotabaru',
            ],
            [
                'name' => 'SMPN 5 Kotabaru',
            ],
            [
                'name' => 'SMPN 6 Kotabaru',
            ],
            [
                'name' => 'MTSN 2 Kotabaru',
            ],
            [
                'name' => 'MTS RAUDHATUL JANNAH',
            ]
        ]);
    }
}
