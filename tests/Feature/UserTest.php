<?php

namespace Tests\Feature;

use App\Enums\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_requires_a_role()
    {
        $this->actingAs(User::factory()->admin()->create());

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
        $user = User::factory()->create();

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

    public function test_only_authenticated_admins_can_create_users()
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->post('/users', [
                'name' => 'Test User',
                'username' => 'test-user',
                'email' => 'test@example.com',
                'password' => 'password',
                'password_confirmation' => 'password',
                'role' => Role::USER->value,
            ])
            ->assertForbidden();

        $user->update([
            'role' => Role::ADMIN,
        ]);

        $this->actingAs($user)
            ->post('/users', [
                'name' => 'Test User',
                'username' => 'test-user',
                'email' => 'test@example.com',
                'password' => 'password',
                'password_confirmation' => 'password',
                'role' => Role::USER->value,
            ])
            ->assertRedirect();

        $this->assertDatabaseHas('users', [
            'name' => 'Test User',
            'username' => 'test-user',
            'email' => 'test@example.com',
            'role' => Role::USER->value,
        ]);
    }
}
