<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;

use App\Models\User;


class UserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Indicates whether the default seeder should run before each test.
     *
     * @var bool
     */
    protected $seed = true;

    //bejelentkezés
    public function test_user_can_see_login()
    {
        $response = $this->get('/login');

        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
    }
    
    public function test_good_login()
    {
        $data = [            
            'email' => "admin@admin.hu",
            'password' => "adminadmin", 
            '_token' => csrf_token()
        ];

        $response = $this->json('POST', '/login', $data);
        $response->assertStatus(200);     
    }

    public function test_bad_login()
    {
        $data = [            
            'email' => "random@random.hu",
            'password' => "asdfasdf", 
            '_token' => csrf_token()
        ];

        $response = $this->json('POST', '/login', $data);
        $response->assertStatus(422);
        $response->assertJson(['message' => "The given data was invalid."]);        
    }

    public function test_user_redirect_to_home_after_login()
    {
        $user = User::find(1);

        $response = $this->actingAs($user)->get('/login');

        $response->assertRedirect('/home');
    }
    
    //kijelentkezés
    public function test_user_can_logout()
    {
        $this->be(User::find(1));

        $response = $this->post('/logout');

        $response->assertRedirect('/');
        $this->assertGuest();
    }

    //regisztráció
    public function test_user_can_see_registration()
    {
        $response = $this->get('/register');

        $response->assertSuccessful();
        $response->assertViewIs('auth.register');
    }

    public function test_good_register()
    {
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@test.com',
            'password' => 'asdfasdf',
            'password_confirmation' => 'asdfasdf',
        ]);

        $response->assertRedirect('/home');
        $users = User::all();
        $this->assertAuthenticatedAs($user = $users->last());
        $this->assertEquals('Test User', $user->name);
        $this->assertEquals('test@test.com', $user->email);
        $this->assertTrue(Hash::check('asdfasdf', $user->password));        
    }

    public function test_bad_register()
    {
        $response = $this->from('/register')->post('/register', [
            'name' => 'Test User',
            'email' => 'test@test.com',
            'password' => 'asdfasdf',
            'password_confirmation' => '',
        ]);

        $users = User::all();
        $response->assertRedirect('/register');
        $response->assertSessionHasErrors('password'); 
        $this->assertTrue(session()->hasOldInput('name'));
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();    
    }

}
