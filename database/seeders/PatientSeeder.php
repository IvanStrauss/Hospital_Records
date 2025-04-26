<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('patients')->truncate();

        DB::table('patients')->insert([
            [
                'name' => 'Alice Johnson',
                'email' => 'alice@example.com',
                'contact_number' => '09171234567',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bob Cruz',
                'email' => 'bob@example.com',
                'contact_number' => '09181234567',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cathy Lee',
                'email' => 'cathy@example.com',
                'contact_number' => '09191234567',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
