<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
/*
use Database\Seeders\UserSeeder;
use Database\Seeders\TeamSeeder;
use Database\Seeders\MeetingSeeder;
use Database\Seeders\ActionpointSeeder;
use Database\Seeders\PlusMinusTaskSeeder;
use Database\Seeders\DiarySeeder;
use Database\Seeders\BlogSeeder;
*/

use App\Models\User;
use App\Models\Team;
use App\Models\Meeting;
use App\Models\Actionpoint;
use App\Models\PlusMinusTask;
use App\Models\Diary;
use App\Models\Blog;


class DatabaseCountTest extends TestCase
{   
    use RefreshDatabase;

    /**
     * Indicates whether the default seeder should run before each test.
     *
     * @var bool
     */
    protected $seed = true;

    
    /**
     * Az adatbázisban minden adat migrálva lett.
     */
    //felhasználók
    public function test_have_7_users()
    {
        $this->assertEquals(7, User::count());        
    }
    //csapatok
    public function test_have_4_teams()
    {
        $this->assertEquals(4, Team::count());        
    }
    //megbeszélések
    public function test_have_5_meetings()
    {
        $this->assertEquals(5, Meeting::count());        
    }
    //akciópontok
    public function test_have_10_actionpoints()
    {
        $this->assertEquals(10, Actionpoint::count());        
    }
    //plusz-mínusz kártyák
    public function test_have_7_plus_minus_tasks()
    {
        $this->assertEquals(7, PlusMinusTask::count());        
    }
    //blogok
    public function test_have_5_blogs()
    {
        $this->assertEquals(5, Blog::count());        
    }
    //naplózott sorok
    public function test_have_5_diaries()
    {
        $this->assertEquals(5, Diary::count());        
    }

}
