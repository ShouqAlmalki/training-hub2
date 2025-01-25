<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = [
            [
                "name"=> "Yara Alqahtani",
                "email"=> "s443001234@uqu.edu.sa",
                "password"=> bcrypt("Pa@s1234"),
                "role"=> "student",
                "supervisor_id"=> 1,
                "section_number"=> 101,
            ],
            [
                "name"=> "Nouf Alghamdi",
                "email"=> "s443002345@uqu.edu.sa",
                "password"=> bcrypt("Pa@s2345"),
                "role"=> "student",
                "supervisor_id"=> 1,
                "section_number"=> 101,
            ],
            [
                "name"=> "Huda Alzahrani",
                "email"=> "s443003456@uqu.edu.sa",
                "password"=> bcrypt("Pa@s3456"),
                "role"=> "student",
                "supervisor_id"=> 1,
                "section_number"=> 101,
            ],
            [
                "name"=> "Deema Alharbi",
                "email"=> "s443004567@uqu.edu.sa",
                "password"=> bcrypt("Pa@s4567"),
                "role"=> "student",
                "supervisor_id"=> 2,
                "section_number"=> 102,
            ],
            [
                "name"=> "Manal Alshehri",
                "email"=> "s443005678@uqu.edu.sa",
                "password"=> bcrypt("Pa@s5678"),
                "role"=> "student",
                "supervisor_id"=> 2,
                "section_number"=> 102,
            ],
            [
                "name"=> "Laila Alsubaie",
                "email"=> "s443006789@uqu.edu.sa",
                "password"=> bcrypt("Pa@s6789"),
                "role"=> "student",
                "supervisor_id"=> 2,
                "section_number"=> 102,
            ],
            [
                "name"=> "Maryam Aldosari",
                "email"=> "s443007890@uqu.edu.sa",
                "password"=> bcrypt("Pa@s7890"),
                "role"=> "student",
                "supervisor_id"=> 3,
                "section_number"=> 103,
            ],
            [
                "name"=> "Salma Alotaibi",
                "email"=> "s443008901@uqu.edu.sa",
                "password"=> bcrypt("Pa@s8901"),
                "role"=> "student",
                "supervisor_id"=> 3,
                "section_number"=> 103,
            ],
            [
                "name"=> "Joud Alshahrani",
                "email"=> "s443009012@uqu.edu.sa",
                "password"=> bcrypt("Pa@s9012"),
                "role"=> "student",
                "supervisor_id"=> 3,
                "section_number"=> 103,
            ],
            [
                "name"=> "Dana Alshamrani",
                "email"=> "s443001023@uqu.edu.sa",
                "password"=> bcrypt("Pa@s1023"),
                "role"=> "student",
                "supervisor_id"=> 4,
                "section_number"=> 104,
            ],
            [
                "name"=> "Lana Almutairi",
                "email"=> "s443001134@uqu.edu.sa",
                "password"=> bcrypt("Pa@s1134"),
                "role"=> "student",
                "supervisor_id"=> 4,
                "section_number"=> 104,
            ],
            [
                "name"=> "Amal Alruwais",
                "email"=> "s443001245@uqu.edu.sa",
                "password"=> bcrypt("Pa@s1245"),
                "role"=> "student",
                "supervisor_id"=> 4,
                "section_number"=> 104,
            ],
            [
                "name"=> "Lama Alenzi",
                "email"=> "s443001356@uqu.edu.sa",
                "password"=> bcrypt("Pa@s1356"),
                "role"=> "student",
                "supervisor_id"=> 5,
                "section_number"=> 105,
            ],
            [
                "name"=> "Dalia Alazmi",
                "email"=> "s443001467@uqu.edu.sa",
                "password"=> bcrypt("Pa@s1467"),
                "role"=> "student",
                "supervisor_id"=> 5,
                "section_number"=> 105,
            ],
            [
                "name"=> "Bayan Alkhaldi",
                "email"=> "s443001578@uqu.edu.sa",
                "password"=> bcrypt("Pa@s1578"),
                "role"=> "student",
                "supervisor_id"=> 5,
                "section_number"=> 105,
            ],
            [
                "name"=> "Mahmoud Student",
                "email"=> "mahmoud@student.com",
                "password"=> bcrypt("password"),
                "role"=> "student",
                "supervisor_id"=> 6,
                "section_number"=> 106,
            ],
            
        ];
        User::insert($students);
    }
}
