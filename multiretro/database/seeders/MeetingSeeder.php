<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MeetingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('meetings')->insert([
            'name' => 'Test Meeting 1',
            'owner' => '1',
            'meet_date' => Carbon::create('2020', '01', '01', '10', '30'),
            'team_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('meetings')->insert([
            'name' => 'Test Meeting 2',
            'owner' => '1',
            'meet_date' => Carbon::create('2020', '02', '01', '9'),
            'team_id' => '2',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('meetings')->insert([
            'name' => 'Test Meeting 3',
            'owner' => '2',
            'meet_date' => Carbon::create('2020', '03', '01', '12', '45'),
            'team_id' => '3',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('meetings')->insert([
            'name' => 'Test Meeting 4',
            'owner' => '3',
            'meet_date' => Carbon::create('2020', '04', '01', '13', '10'),
            'team_id' => '4',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('meetings')->insert([
            'name' => 'Test Meeting 5',
            'owner' => '4',
            'meet_date' => Carbon::create('2020', '05', '01', '16'),
            'team_id' => '3',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
    }
}
