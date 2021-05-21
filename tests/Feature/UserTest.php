<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function testCreate(){

        $user = new User;

        $user->id = '1';
        $user->name = 'Hans Vogler';
        $user->email = 'test@abc.xyz';
        $user->password = '$2y$10$uUD0wQXkpzhSVTn7mi8Re.bTPvjzfOEkOH4MsNr4cHqehtm/4N3wW';

        $user->save();

        $this->assertDatabaseCount($user, '1');	
    }

    public function testRead(){

        $user = new User;
        $user->name = 'Hans Peter';
        $user->save();

        $response = $this->get('/user');

        $post->assertSee = $user->name;
    }

    public function testUpdate(){

        $user = User::find()->where('id','=','1')->get();

        $user->name = 'Kenny Pause';

        $user->save();

        $this->assertDatabaseCount($user, '1');	
    }

    public function testDelete(){

        $user = User::find()->where('id','=','1')->get();

        $user->delete();

        $this->assertDatabaseCount($user, '0');	
    }
}
