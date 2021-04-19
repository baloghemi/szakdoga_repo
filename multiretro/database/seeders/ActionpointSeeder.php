<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ActionpointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //MEETING 1
        DB::table('actionpoints')->insert([
            'description' => 'This is the description of Test Actionpoint 1.',
            'status' => 'done',
            'act_date' => Carbon::create('2020', '01', '01', '10', '50'),
            'user_id' => '1',
            'meeting_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('actionpoints')->insert([
            'description' => 'This is the description of Test Actionpoint 2.',
            'act_date' => Carbon::create('2020', '01', '01', '11', '14'),
            'user_id' => '1',
            'meeting_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('actionpoints')->insert([
            'description' => 'This is the description of Test Actionpoint 3.',
            'act_date' => Carbon::create('2020', '02', '01', '9', '15'),
            'user_id' => '2',
            'meeting_id' => '2',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('actionpoints')->insert([
            'description' => 'This is the description of Test Actionpoint 4.',
            'status' => 'doing',
            'act_date' => Carbon::create('2020', '02', '01', '9', '33'),
            'user_id' => '3',
            'meeting_id' => '2',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //OTHER MEETINGS
        DB::table('actionpoints')->insert([
            'description' => 'This is the description of Test Actionpoint 5.',
            'act_date' => Carbon::create('2020', '02', '01', '9', '41'),
            'user_id' => '1',
            'meeting_id' => '2',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('actionpoints')->insert([
            'description' => 'This is the description of Test Actionpoint 6.',
            'act_date' => Carbon::create('2020', '03', '01', '12', '59'),
            'user_id' => '1',
            'meeting_id' => '3',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('actionpoints')->insert([
            'description' => 'This is the description of Test Actionpoint 7.',
            'act_date' => Carbon::create('2020', '04', '01', '13', '36'),
            'user_id' => '1',
            'meeting_id' => '4',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('actionpoints')->insert([
            'description' => 'This is the description of Test Actionpoint 8.',
            'act_date' => Carbon::create('2020', '03', '01', '13', '21'),
            'user_id' => '4',
            'meeting_id' => '3',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('actionpoints')->insert([
            'description' => 'This is the description of Test Actionpoint 9.',
            'act_date' => Carbon::create('2020', '05', '01', '16', '11'),
            'user_id' => '2',
            'meeting_id' => '5',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('actionpoints')->insert([
            'description' => 'This is the description of Test Actionpoint 10.',
            'act_date' => Carbon::create('2020', '05', '01', '16', '36'),
            'user_id' => '7',
            'meeting_id' => '5',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
