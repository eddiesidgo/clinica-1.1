<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $events = [
        [
            'event' => 'Cita #1',
            'start_date' => '2024-05-22 8:00',
            'end_date' => '2024-05-22 10:00',
        
        ],    
        [
            'event' => 'Cita #2',
            'start_date' => '2024-05-23 8:00',
            'end_date' => '2024-05-23 10:00',
        ],
        [
            'event' => 'Cita #3',
            'start_date' => '2024-05-24 8:00',
            'end_date' => '2024-05-24 10:00',
        ],
        [
            'event' => 'Cita #4',
            'start_date' => '2024-05-24 8:00',
            'end_date' => '2024-05-24 10:00',
        ],
    ];

    foreach ($events as $event) {
        Event::create($event);
    }
    }
}
