<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class LoginTest extends DuskTestCase
{
    Use DatabaseMigrations;
    /**
     * A Dusk test example.
     *
     * @return void
     */

    public function testRegistration()
    {
        use DatabaseMigrations;

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                    ->type('name', 'Andreas')
                    ->type('email', 'andreas.siaplaouras@gmail.com')
                    ->type('password', 'abcd1234')
                    ->type('password-confirmation', 'abcd1234')
                    ->press('Register')
                    ->assertPathIs('/');

        });
    }

    public function testUnauthLogin(){
     
        use DatabaseMigrations;

            $browser->visit('/home')
                    ->assertSee('Login')
                    ->assertSee('Registration Form');

            $this->assertAuthenticated();
        })
    }

    public function testAuthLogin(){
     
        use DatabaseMigrations;

        $user = User::create([
            'email' => 'andreas.siaplaouras@gmail.com',
            'name' => 'Andreas',
            'password' => 'abcd1234'
        ]);

        $this->browse(function ($browser){

            $browser->visit('/')
                    ->type('email',$user->email)
                    ->type('password',$user->password)
                    ->press('Login');

            $browser->visit('/home')
                    ->assertSee($user->name)
                    ->assertSee('Edit Profile')
                    ->assertSee('My Posts')
                    ->assertSee('Logout')
                    ->assertSee('Create new Post')

            $this->assertAuthenticated();
        })
    }

    public function testUnauthUserList(){
        $this->browse(function ($browser){

            $browser->visit('/user')
            ->assertSee('403')
        })
    }

    public function testAuthUserList(){
        $this->browse(function ($browser){
            $browser->visit('/')
                    ->type('email',$user->email)
                    ->type('password',$user->password)
                    ->press('Login');

            $browser->visit('/user')
                    ->assertDontSee('403');
        })
    }

    public function testElements()
    {
        use DatabaseMigrations;

        $user = User::create([
            'email' => 'andreas.siaplaouras@gmail.com',
            'name' => 'Andreas',
            'password' => 'abcd1234'
        ]);

        $post = Post::create([
            'id' => '1',
            'title' => 'Test',
            'content' => 'Test',
            'author' => '1'
        ]);

        $this->browse(function ($browser){

            $browser->visit('/')
                    ->type('email',$user->email)
                    ->type('password',$user->password)
                    ->press('Login');

            $browser->visit('/post')
                    ->type('title', $post->title)
                    ->type('name', $post->content)
                    ->type('content', $post->content)
                    ->type('user_id', $post->author)
                    ->press('Submit')
                    ->assertPathIs('/post/create');

                    $browser->visit('/home')
                            ->assertSee($post->title);
        });
    }

    public function TestCreatePostView($first)
    {
        use DatabaseMigrations;

        $first->loginAs(User::find(1)->visit('/home');

        $browser->clickLink('Create new Post');

        $response->assertViewIs('post-detail');

    }

    public function TestLogout($first)
    {
        use DatabaseMigrations;

        $first->loginAs(User::find(1))

        $response = $this->get('/home');

        $browser->clickLink('Logout');

        $response->assertViewIs('welcome');

    }


}
