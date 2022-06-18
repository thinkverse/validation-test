<?php

namespace Tests\Feature;

use App\Enums\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;

    public function test_a_user_requires_a_role()
    {
        $this->actingAs(User::factory()->create([
            'role' => Role::ADMIN,
        ]));

        $attributes = User::factory()->raw([
            'role' => '',
        ]);

        $this->post('/users', $attributes)
            ->assertSessionHasErrors('role');
    }

    public function test_guests_cannot_view_users()
    {
        $this->get('/users')->assertRedirect('login');
    }

    public function test_only_authenticated_admins_can_view_users()
    {
        $user = User::factory()->create([
            'role' => Role::USER,
        ]);

        $this->actingAs($user)
            ->get('/users')
            ->assertForbidden();

        $user->update([
            'role' => Role::ADMIN,
        ]);

        $this->actingAs($user)
            ->get('/users')
            ->assertOk();
    }
}
