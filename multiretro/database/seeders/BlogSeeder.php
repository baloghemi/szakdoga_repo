<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blogs')->insert([
            'title' => 'Test Blog 1',
            'text' => 'This is the text of Test Blog 1.',  
            'tag1' => 'test',
            'tag2' => 'blog',
            'tag3' => 'tag1',            
            'user_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('blogs')->insert([
            'title' => 'Test Blog 2',
            'text' => 'This is the text of Test Blog 2.', 
            'tag1' => 'test',
            'tag2' => 'blog',
            'tag3' => 'tag1', 
            'user_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('blogs')->insert([
            'title' => 'Test Blog 3',
            'text' => 'This is the text of Test Blog 3.', 
            'tag1' => 'test',
            'tag2' => 'blog',
            'tag3' => 'tag2',
            'user_id' => '2',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('blogs')->insert([
            'title' => 'Test Blog 4',
            'text' => 'This is the text of Test Blog 4.',  
            'tag1' => 'test',
            'tag2' => 'blog',
            'tag3' => 'tag2',
            'user_id' => '4',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('blogs')->insert([
            'title' => 'Test Blog 5',
            'text' => 'This is the text of Test Blog 5.', 
            'tag1' => 'test',
            'tag2' => 'blog',
            'tag3' => 'tag1',
            'user_id' => '6',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
