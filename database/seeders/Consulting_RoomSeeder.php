<?php

namespace Database\Seeders;

use App\Models\Consulting_room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Consulting_RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Consulting_room::create(
            [
                'name' => "consultorio 1",
                'location' => "#",
                'phone'=>"#",

            ]
        );
    }
}
