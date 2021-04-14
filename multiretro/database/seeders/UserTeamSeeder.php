<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('team_user')->insert([
            'user_id' => '1',
            'team_id' => '4',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('team_user')->insert([
            'user_id' => '1',
            'team_id' => '3',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('team_user')->insert([
            'user_id' => '2',
            'team_id' => '2',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('team_user')->insert([
            'user_id' => '3',
            'team_id' => '2',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('team_user')->insert([
            'user_id' => '4',
            'team_id' => '3',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('team_user')->insert([
            'user_id' => '6',
            'team_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('team_user')->insert([
            'user_id' => '4',
            'team_id' => '2',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('team_user')->insert([
            'user_id' => '7',
            'team_id' => '3',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
