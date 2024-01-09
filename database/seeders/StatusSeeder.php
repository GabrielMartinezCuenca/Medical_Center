<?php

namespace Database\Seeders;

use App\Models\Appointment_status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Appointment_status::create([
            'name' => 'En proceso',
        ]);
        Appointment_status::create([
            'name' => 'Aprobado',
        ]);
        Appointment_status::create([
            'name' => 'Terminado',
        ]);
        Appointment_status::create([
            'name' => 'Cancelado',
        ]);
    }
}
