<?php

namespace Tests\UseCase;

use App\Enums\Role;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EventsTest extends TestCase
{
    use RefreshDatabase;

    public function test_newly_registered_users_can_view_events()
    {
        $admin = User::factory()->admin()->create();

        $this->actingAs($admin)
            ->post('/users', [
                'name' => 'Test User',
                'email' => $email = 'test@example.com',
                'password' => 'password',
                'password_confirmation' => 'password',
                'role' => Role::USER->value,
            ]);

        $this->actingAs($admin)
            ->post('/logout')
            ->assertRedirect('/');

        $this->post('/login', [
            'email' => $email,
            'password' => 'password',
        ])->assertRedirect(RouteServiceProvider::HOME);

        $this->get('/events')
            ->assertOk()
            ->assertSee('Test User');
    }
}
