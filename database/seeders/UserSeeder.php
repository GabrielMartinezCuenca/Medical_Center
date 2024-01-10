<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(
            [
                'name' => 'Administrador',
                'lastname' => 'CM',
                'email' => 'medicocentro78@gmail.com',
                'password' => Hash::make('CMAdmin2024'),

            ]
        )->assignRole('administrador');

    }
}
