<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                "name"=> "Nora Alqahtani",
                "email"=> "noqaht@uqu.edu.sa",
                "password"=> bcrypt("Pa@s1234"),
                "role"=> "supervisor",
                "section_number"=> 101
            ],
            [
                "name"=> "Sara Alghamdi",
                "email"=> "sagaam@uqu.edu.sa",
                "password"=> bcrypt("Pa@s2345"),
                "role"=> "supervisor",
                "section_number"=> 102
            ],
            [
                "name"=> "Fatimah Alzahrani",
                "email"=> "fazaha@uqu.edu.sa",
                "password"=> bcrypt("Pa@s3456"),
                "role"=> "supervisor",
                "section_number"=> 103
            ],
            [
                "name"=> "Huda Alharbi",
                "email"=> "huhuha@uqu.edu.sa",
                "password"=> bcrypt("Pa@s4567"),
                "role"=> "supervisor",
                "section_number"=> 104
            ],
            [
                "name"=> "Reem Alshehri",
                "email"=> "reshri@uqu.edu.sa",
                "password"=> bcrypt("Pa@s5678"),
                "role"=> "supervisor",
                "section_number"=> 105
            ],
            [
                "name"=> "Mahmoud Supervisor",
                "email"=> "mahmoud@supervisor.com",
                "password"=> bcrypt("password"),
                "role"=> "supervisor",
                "section_number"=> 106
            ],
        ];
        User::insert($users);
    }
}
