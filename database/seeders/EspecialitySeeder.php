<?php

namespace Database\Seeders;

use App\Models\Medical_especiality;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EspecialitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Medical_especiality::create(
            [
                'especiality' => 'Médico de Familia',
            ]
        );
        Medical_especiality::create(
            [
                'especiality' => 'Médico General',
            ]
        );
        Medical_especiality::create(
            [
                'especiality' => 'Médico Internista',
            ]
        );

    }
}
