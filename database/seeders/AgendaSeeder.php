<?php

namespace Database\Seeders;

use App\Models\Agenda;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AgendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        # Dia 09-06
        Agenda::create([
            'date' => '09-06-2025',
            'hour' => '09:00',
            'vacancy' => '10',
            'filled' => '0',
        ]);

         Agenda::create([
            'date' => '09-06-2025',
            'hour' => '09:30',
            'vacancy' => '10',
            'filled' => '0',
        ]);

         Agenda::create([
            'date' => '09-06-2025',
            'hour' => '10:00',
            'vacancy' => '10',
            'filled' => '0',
        ]);

        Agenda::create([
            'date' => '09-06-2025',
            'hour' => '11:00',
            'vacancy' => '10',
            'filled' => '0',
        ]);

        Agenda::create([
            'date' => '09-06-2025',
            'hour' => '11:30',
            'vacancy' => '10',
            'filled' => '0',
        ]);

        Agenda::create([
            'date' => '09-06-2025',
            'hour' => '12:00',
            'vacancy' => '10',
            'filled' => '0',
        ]);

        # Dia 10-06

        Agenda::create([
            'date' => '10-06-2025',
            'hour' => '09:00',
            'vacancy' => '10',
            'filled' => '0',
        ]);

        Agenda::create([
            'date' => '10-06-2025',
            'hour' => '09:30',
            'vacancy' => '10',
            'filled' => '0',
        ]);

        Agenda::create([
            'date' => '10-06-2025',
            'hour' => '10:00',
            'vacancy' => '10',
            'filled' => '0',
        ]);

        Agenda::create([
            'date' => '10-06-2025',
            'hour' => '10:30',
            'vacancy' => '10',
            'filled' => '0',
        ]);

        Agenda::create([
            'date' => '10-06-2025',
            'hour' => '11:00',
            'vacancy' => '10',
            'filled' => '0',
        ]);

        Agenda::create([
            'date' => '10-06-2025',
            'hour' => '11:30',
            'vacancy' => '10',
            'filled' => '0',
        ]);
    }
}
