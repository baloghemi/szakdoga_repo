<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teams')->insert([
            'name' => 'Test Team 1',
            'user_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('teams')->insert([
            'name' => 'Test Team 2',
            'user_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('teams')->insert([
            'name' => 'Test Team 3',
            'user_id' => '2',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('teams')->insert([
            'name' => 'Test Team 4',
            'user_id' => '3',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    
    }   
    
}
