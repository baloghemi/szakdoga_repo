<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin Admin',            
            'email' => 'admin@admin.hu',
            'password' => Hash::make('adminadmin'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Test User 1',            
            'email' => 't_1@t.hu',
            'password' => Hash::make('asdfasdf'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Test User 2',            
            'email' => 't_2@t.hu',
            'password' => Hash::make('asdfasdf'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Test User 3',            
            'email' => 't_3@t.hu',
            'password' => Hash::make('asdfasdf'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Test User 4',            
            'email' => 't_4@t.hu',
            'password' => Hash::make('asdfasdf'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Test User 5',            
            'email' => 't_5@t.hu',
            'password' => Hash::make('asdfasdf'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Test User 6',            
            'email' => 't_6@t.hu',
            'password' => Hash::make('asdfasdf'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
