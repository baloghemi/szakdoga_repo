<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

use App\Models\User;
use App\Models\Team;
use App\Models\Meeting;
use App\Models\Actionpoint;
use App\Models\PlusMinusTask;
use App\Models\Diary;
use App\Models\Blog;

class DatabaseRelationshipTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Indicates whether the default seeder should run before each test.
     *
     * @var bool
     */
    protected $seed = true;

    /**
     * Az adatbázis táblái jól kapcsolódnak egymáshoz.
     */
    
    //felhasználó - csapat
    public function test_user_team_relationship()
    {
        $user = User::find(1);
        $teams = $user->owner_teams;
        $team = $user->owner_teams->find(1);

        $this->assertEquals(2, $teams->count());        
        $this->assertEquals($user->id, $team->team_owner->id);        
    }

    //felhasználó - megbeszélés
    public function test_user_meeting_relationship()
    {
        $user = User::find(1);
        $meetings = $user->owner_meetings;
        $meeting = $user->owner_meetings->find(1);

        $this->assertEquals(2, $meetings->count());        
        $this->assertEquals($user->id, $meeting->meet_owner->id);        
    }

    //felhasználó - akciópont
    public function test_user_actionpoint_relationship()
    {
        $user = User::find(1);
        $actionpoints = $user->owner_actionpoints;
        $actionpoint = $user->owner_actionpoints->find(1);

        $this->assertEquals(5, $actionpoints->count());        
        $this->assertEquals($user->id, $actionpoint->action_owner->id);        
    }

    //felhasználó - plusz-mínusz kártya
    public function test_user_plus_minus_task_relationship()
    {
        $user = User::find(1);
        $tasks = $user->owner_tasks;
        $task = $user->owner_tasks->find(1);

        $this->assertEquals(4, $tasks->count());        
        $this->assertEquals($user->id, $task->task_owner->id);        
    }

    //felhasználó - blog
    public function test_user_blog_relationship()
    {
        $user = User::find(1);
        $blogs = $user->owner_blogs;
        $blog = $user->owner_blogs->find(1);

        $this->assertEquals(2, $blogs->count());        
        $this->assertEquals($user->id, $blog->blog_owner->id);        
    }

    //felhasználó - naplózott sorok
    public function test_user_diary_relationship()
    {
        $user = User::find(1);
        $diaries = $user->owner_diaries;
        $diary = $user->owner_diaries->find(1);

        $this->assertEquals(2, $diaries->count());        
        $this->assertEquals($user->id, $diary->diary_owner->id);        
    }

    //megbeszélés - naplózott sorok
    public function test_meeting_diary_relationship()
    {
        $meeting = Meeting::find(2);
        $diaries = $meeting->diaries;
        $diary = Diary::where('meeting_id', $meeting->id)->firstOrFail();
        
        $this->assertEquals(4, $diaries->count());        
        $this->assertEquals($meeting->id, $diary->meeting_diary->id);        
    }

    //megbeszélés - akciópontok
    public function test_meeting_actionpoint_relationship()
    {
        $meeting = Meeting::find(2);
        $actionpoints = $meeting->actionpoints;
        $actionpoint = Actionpoint::where('meeting_id', $meeting->id)->firstOrFail();

        $this->assertEquals(3, $actionpoints->count());        
        $this->assertEquals($meeting->id, $actionpoint->meeting_act->id);        
    }

    //megbeszélés - plusz-mínusz kártya
    public function test_meeting_plus_minus_task_relationship()
    {
        $meeting = Meeting::find(2);
        $tasks = $meeting->plus_minus_tasks;
        $task = PlusMinusTask::where('meeting_id', $meeting->id)->firstOrFail();

        $this->assertEquals(2, $tasks->count());        
        $this->assertEquals($meeting->id, $task->meeting_task->id);        
    }

    //csapat - megbeszélés
    public function test_team_meeting_relationship()
    {
        $team = Team::find(3);
        $meetings= $team->meetings;
        $meeting = Meeting::where('team_id', $team->id)->firstOrFail();

        $this->assertEquals(2, $meetings->count());        
        $this->assertEquals($team->id, $meeting->team->id);        
    }

    //csapat - felhasználó
    public function test_team_user_relationship()
    {
        $user = User::find(1);
        $team = Team::find(2);

        $users = $team->users;
        $teams = $user->teams;

        $this->assertEquals(3, $users->count());        
        $this->assertEquals(2, $teams->count());        
    } 

}
