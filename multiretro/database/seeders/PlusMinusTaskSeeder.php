<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PlusMinusTaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //MEETING 1
        DB::table('plus_minus_tasks')->insert([
            'text' => 'This is the positive text of Test PlusMinusTask 1.',
            'feeling' => '0',
            'user_id' => '1',
            'meeting_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('plus_minus_tasks')->insert([
            'text' => 'This is the negative text of Test PlusMinusTask 2.',
            'feeling' => '1',
            'user_id' => '1',
            'meeting_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('plus_minus_tasks')->insert([
            'text' => 'This is the positive text of Test PlusMinusTask 3.',
            'feeling' => '1',
            'positive' => '1',
            'user_id' => '6',
            'meeting_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //MEETING 2
        DB::table('plus_minus_tasks')->insert([
            'text' => 'This is the negative text of Test PlusMinusTask 4.',
            'feeling' => '1',
            'negative' => '2',
            'user_id' => '2',
            'meeting_id' => '2',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('plus_minus_tasks')->insert([
            'text' => 'This is the positive text of Test PlusMinusTask 5.',
            'feeling' => '0',
            'user_id' => '1',
            'meeting_id' => '2',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //MEETING 3
        DB::table('plus_minus_tasks')->insert([
            'text' => 'This is the positive text of Test PlusMinusTask 6.',
            'feeling' => '0',
            'positive' => '1',
            'user_id' => '4',
            'meeting_id' => '3',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //MEETING 4
        DB::table('plus_minus_tasks')->insert([
            'text' => 'This is the positive text of Test PlusMinusTask 6.',
            'feeling' => '0',
            'user_id' => '1',
            'meeting_id' => '4',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //MEETING 5
        DB::table('plus_minus_tasks')->insert([
            'text' => 'This is the positive text of Test PlusMinusTask 6.',
            'feeling' => '0',
            'positive' => '1',
            'negative' => '1',
            'user_id' => '7',
            'meeting_id' => '5',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
