<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class PostTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function DeletePostButtonVisibleOnOwnPost()
    {
        use DatabaseMigrations;

        $post = new Post;
        $post->id = '1';
        $post->user_id = '1';
        $post->save();

        $user = new User;
        $user->id = '1';
        $user->save();

        $browser->loginAs(User::find(1));

        $browser->visit('/post/1')

        $response->assertSee('Submit');
        $response->assertSee('Cancel');
        $response->assertSee('Delete');
    }

    public function DeletePostButtonVisibleOnOtherPost($first)
    {
        use DatabaseMigrations;

        $post = new Post;
        $post->id = '1';
        $post->user_id = '2';
        $post->save();

        $user = new User;
        $user->id = '1';
        $user->save();

        $first->loginAs(User::find(1));

        $browser->visit('/post/1')

        $response->assertDontSee('Submit');
        $response->assertSee('Return');
        $response->assertDontSee('Delete');
    }

    
}
