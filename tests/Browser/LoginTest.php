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
    /*public function testExample()
    {
        $user = User::create([
            'email' => 'andreas.siaplaouras@gmail.com',
            'name' => 'Andreas',
            'password' => 'abcd1234'
        ]);

        $this->browse(function ($browser) /*use ($user) {
            $browser->visit('/login')
                    ->type('email', $user->email)
                    ->type('password', 'password')
                    ->type('name', $user->name)
                    ->press('Login')
                    ->assertPathIs('/home');

                    $browser->visit('/login')
                            ->assertSee('Login');
        });
    }*/
}
