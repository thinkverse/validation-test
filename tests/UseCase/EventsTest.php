<?php

namespace Tests\UseCase;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EventsTest extends TestCase
{
    use RefreshDatabase;

    public function test_newly_registered_users_can_view_events()
    {
        $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ])->assertRedirect('/dashboard');

        $this->get('/events')->assertOk();
    }
}
