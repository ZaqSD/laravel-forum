<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Post;

class PostTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */


     /*
     * Sollten die Testing-Tabellen ned automatisch generiert werden? Weil bei mir passiert nix. Idk obs eif ein projektproblem ist eif fyi.
     */

    public function testCreate(){

        $post = new Post;

        $post->id = '1';
        $post->title = 'Test';
        $post->content = 'Test';
        $post->user_id = '1';

        $post->save();

        $this->assertDatabaseCount($post, '1');	
    }

    public function testRead(){

        $post = new Post;
        $post->title = '1';
        $post->save();

        $response = $this->get('/home');

        $post->assertSee = $post->title;
    }

    public function testUpdate(){

        $post = Post::find()->where('id','=','1')->get();

        $post->title = 'Edited';

        $post->save();

        $this->assertDatabaseCount($post, '1');	
    }

    public function testDelete(){

        $post = Post::find()->where('id','=','1')->get();

        $post->delete();

        $this->assertDatabaseCount($post, '0');	
    }
}
