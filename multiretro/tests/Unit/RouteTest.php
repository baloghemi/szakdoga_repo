<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\User;


class RouteTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Indicates whether the default seeder should run before each test.
     *
     * @var bool
     */
    protected $seed = true;
    
    //felhasználó nézet
    public function test_userprofile_view() {
        $this->be(User::find(1));

        $response = $this->get('/userprofile');
        $response->assertStatus(200);
    }

    //csapat nézet
    public function test_teams_view() {
        $this->be(User::find(1));

        $response = $this->get('/teams');
        $response->assertStatus(200);
    }

    //csapat lista nézet
    public function test_team_list_view() {
        $this->be(User::find(1));

        $response = $this->get('/team_list');
        $response->assertStatus(200);
    }

    //megbeszélés nézet
    public function test_meetings_view() {
        $this->be(User::find(1));

        $response = $this->get('/meetings');
        $response->assertStatus(200);
    }

    //megbeszélés lista nézet
    public function test_meeting_list_view() {
        $this->be(User::find(1));

        $response = $this->get('/meeting_list');
        $response->assertStatus(200);
    }

    //akciópontok nézet
    public function test_actionpoints_view() {
        $this->be(User::find(1));

        $response = $this->get('/actionpoints');
        $response->assertStatus(200);
    }

    //akciópontok lista nézet
    public function test_actionpoint_list_view() {
        $this->be(User::find(1));

        $response = $this->get('/actionpoint_list');
        $response->assertStatus(200);
    }

    //blogok nézet
    public function test_blogs_view() {
        $this->be(User::find(1));

        $response = $this->get('/blogs');
        $response->assertStatus(200);
    }

    //blogok lista nézet
    public function test_blog_list_view() {
        $this->be(User::find(1));

        $response = $this->get('/blog_list');
        $response->assertStatus(200);
    }

    //napló nézet
    public function test_diary_view() {
        $this->be(User::find(1));

        $response = $this->get('/diary');
        $response->assertStatus(200);
    }


}
