<?php

namespace Database\Seeders;

use App\Models\Organization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $organizations = [
            ["name" => "Al-Noor Specialist Hospital"],
            ["name" => "Binladin Group"],
            ["name" => "Kidana Development Company"],
            ["name" => "Ministry of Hajj and Umrah"],
            ["name" => "National Water Company"],
            ["name" => "Royal Commission for Makkah City and Holy Sites"],
            ["name" => "Saudi Electricity Company"],
            ["name" => "Security Forces Hospital"],
            ["name" => "STC"],
            ["name" => "WadiMakkah Company"],
        ];
        Organization::insert($organizations);
    }
}
