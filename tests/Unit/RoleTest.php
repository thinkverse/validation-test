<?php

namespace Tests\Unit;

use App\Enums\Role;
use PHPUnit\Framework\TestCase;

class RoleTest extends TestCase
{
    /** @test */
    public function it_can_check_if_a_role_is_in_list_of_roles()
    {
        $this->assertTrue(Role::ADMIN->in([Role::ADMIN, Role::USER]));
        $this->assertTrue(Role::USER->in([Role::ADMIN, Role::USER]));

        $this->assertTrue(Role::ADMIN->in(['admin', 'user']));
        $this->assertTrue(Role::USER->in(['admin', 'user']));
    }

    /** @test */
    public function it_can_check_if_a_role_is_not_in_list_of_roles()
    {
        $this->assertFalse(Role::ADMIN->in([Role::USER]));
        $this->assertFalse(Role::USER->in([Role::ADMIN]));

        $this->assertFalse(Role::ADMIN->in(['user']));
        $this->assertFalse(Role::USER->in(['admin']));
    }

    /** @test */
    public function it_can_check_if_a_role_matches_a_role()
    {
        $this->assertTrue(Role::ADMIN->is('admin'));
        $this->assertTrue(Role::ADMIN->is(Role::ADMIN));
    }

    /** @test */
    public function it_can_check_if_a_role_does_not_match_a_role()
    {
        $this->assertFalse(Role::ADMIN->is('user'));
        $this->assertFalse(Role::ADMIN->is(Role::USER));
    }
}
