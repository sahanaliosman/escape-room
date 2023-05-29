<?php

namespace Database\Seeders;

use App\Models\EscapeRoom;
use App\Models\EscapeRoomTheme;
use App\Models\TimeSlot;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EscapeRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::all()->first();
        $time_slots = [
            [
                'begin'=> '09:00',
                'end'=> '12:00',
            ],
            [
                'begin'=> '12:00',
                'end'=> '15:00',
            ],
            [
                'begin'=> '15:00',
                'end'=> '18:00',
            ]
        ];

        EscapeRoomTheme::factory(5)->create();
        EscapeRoom::factory(5)->create();

        foreach (EscapeRoom::all() as $escape_room){

            $slot_number = 1;
            foreach ($time_slots as $time_slot){
                TimeSlot::insert([
                    'escape_room_id' => $escape_room->id,
                    'begin' => $time_slot['begin'],
                    'end' => $time_slot['end'],
                    'slot_number' => $slot_number++,
                    'participants' => 0,

                    'creator_id' => $user->id,
                    'updater_id' => $user->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
            }
        }


    }
}
