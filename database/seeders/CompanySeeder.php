<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Company;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = [
            'SMPN 1 Kotabaru',
            'SMPN 2 Kotabaru',
            'SMPN 4 Kotabaru',
            'SMPN 5 Kotabaru',
            'SMPN 6 Kotabaru',
            'MTSN 2 Kotabaru',
            'MTS RAUDHATUL JANNAH'
        ];
        
        foreach ($companies as $company) {
            Company::create(['name' => $company]);
        }        
    }
}
