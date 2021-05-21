<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function SiteWorks()
    {
        $this>get('/home')
            ->assertStatus(200)
            ->assertSee('Forum')
            ->assertSee('My Profile')
            ->assertSee('Create new Post');
    }
}
