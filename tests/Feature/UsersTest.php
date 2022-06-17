<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UsersTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_a_user_requires_a_role()
    {
        $this->actingAs(User::factory()->create([
            'role' => 'admin',
        ]));

        $attributes = User::factory()->raw([
            'role' => '',
        ]);

        $this->post('/users', $attributes)
            ->assertSessionHasErrors('role');
    }
}
