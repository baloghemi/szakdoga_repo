<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            TeamSeeder::class,
            UserTeamSeeder::class,
            MeetingSeeder::class,
            ActionpointSeeder::class,
            PlusMinusTaskSeeder::class,
            BlogSeeder::class,
            DiarySeeder::class,
        ]);
    }
}
