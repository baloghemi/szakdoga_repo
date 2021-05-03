<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DiarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //MEETING 1
        DB::table('diaries')->insert([            
            'weather_report' => json_encode(['1', '2', '1']),
            'form' => json_encode(['5', '5', '3', '3', '1']),
            'meeting_id' => '1',
            'user_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //MEETING 2
        DB::table('diaries')->insert([            
            'weather_report' => json_encode(['1', '2', '1']),
            'form' => json_encode(['4', '5', '3', '3', '2']),
            'meeting_id' => '2',
            'user_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('diaries')->insert([            
            'weather_report' => json_encode(['1', '2', '3']),
            'form' => json_encode(['4', '5', '3', '4', '2']),
            'meeting_id' => '2',
            'user_id' => '2',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('diaries')->insert([            
            'weather_report' => json_encode(['1', '2', '4']),
            'form' => json_encode(['4', '5', '3', '3', '4']),
            'meeting_id' => '2',
            'user_id' => '3',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('diaries')->insert([            
            'weather_report' => json_encode(['1', '2', '1']),
            'form' => json_encode(['5', '5', '3', '3', '1']),
            'meeting_id' => '2',
            'user_id' => '4',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
