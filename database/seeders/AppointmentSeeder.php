<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('appointments')->truncate();

        DB::table('appointments')->insert([
            [
                'doctor_id' => 1,
                'patient_id' => 1,
                'appointment_date' => '2025-05-01',
                'appointment_time' => '10:00:00',
                'status' => 'confirmed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'doctor_id' => 2,
                'patient_id' => 2,
                'appointment_date' => '2025-05-02',
                'appointment_time' => '11:00:00',
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'doctor_id' => 3,
                'patient_id' => 3,
                'appointment_date' => '2025-05-03',
                'appointment_time' => '09:30:00',
                'status' => 'cancelled',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
