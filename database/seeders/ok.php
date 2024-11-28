<?php

namespace Database\Seeders;

use App\Models\event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ok extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        event::insert(
            [
                'EventName' => 'Event A',
                'Category' => 'Technology',
                'Description' => 'Technology event',
                'Date' => '2022-01-01',
                'PIC' => 'John Doe',
                'CollaboratorName' => 'Jane Doe',
                'CollaboratorContact' => '1234567890',
            ]
        );
    }
}
