<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('students')->insert([
            [
                'name' => 'John Doe',
                'student_id_number' => 'F55122001',
                'email' => 'johndoe@example.com',
                'phone_number' => '08123456789',
                'birth_date' => '2004-05-15',
                'gender' => 'Male',
                'status' => 'Active',
                'major_id' => 1,
            ],
            [
                'name' => 'Jane Smith',
                'student_id_number' => 'F55122002',
                'email' => 'janesmith@example.com',
                'phone_number' => '08987654321',
                'birth_date' => '2005-08-20',
                'gender' => 'Female',
                'status' => 'Active',
                'major_id' => 2,
            ]
        ]);
    }
}