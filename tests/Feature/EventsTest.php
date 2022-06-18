<?php

namespace Tests\Feature;

use App\Enums\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EventsTest extends TestCase
{
    use RefreshDatabase;

    public function test_guests_cannot_view_events()
    {
        $this->get('/events')->assertRedirect('login');
    }

    public function test_only_authenticated_can_view_events()
    {
        $user = User::factory()->create([
            'role' => Role::USER,
        ]);

        $this->actingAs($user)
            ->get('events')
            ->assertOk();
    }
}
