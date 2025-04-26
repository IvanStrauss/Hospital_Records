<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Empty the table first
        DB::table('doctors')->truncate();

        DB::table('doctors')->insert([
            [
                'name' => 'Dr. John Doe',
                'email' => 'john@example.com',
                'specialization' => 'Cardiologist',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dr. Jane Smith',
                'email' => 'jane@example.com',
                'specialization' => 'Pediatrician',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dr. Albert Cruz',
                'email' => 'albert@example.com',
                'specialization' => 'Surgeon',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
