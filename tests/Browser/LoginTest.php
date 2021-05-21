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
    public function testExample()
    {

        use DatabaseMigrations;

        $user = User::create([
            'email' => 'andreas.siaplaouras@gmail.com',
            'name' => 'Andreas',
            'password' => 'abcd1234'
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                    ->type('email', $user->email)
                    ->type('password', $user->password)
                    ->type('name', $user->name)
                    ->press('Login')
                    ->assertPathIs('/home');

                    $browser->visit('/home')
                            ->assertSee($user->name);
        });
    }

    public function testElements()
    {
        use DatabaseMigrations;

        $post = Post::create([
            'id' => '1',
            'title' => 'Test',
            'content' => 'Test',
            'author' => '1'
        ]);

        $this->browse(function ($browser) use ($post) {
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

    public function testHome()
    {
        use DatabaseMigrations;

        $this->browse(function ($first, $second) {
            $first->loginAs(User::find(1))
                  ->visit('/home');
        });

        $browser->clickLink('Create new Post');


    }
}
