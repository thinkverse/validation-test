<?php

namespace App\Enums;

enum Role: string
{
    case ADMIN = 'admin';
    case USER = 'user';

    /**
     * Check if the given role is in the list of roles.
     *
     * @param  array<int, string>  $roles
     * @return  bool
     */
    public function in_list(array $roles): bool
    {
        return in_array($this->value, $roles);
    }

    /**
     * Check if the given role matches a role.
     *
     * @param  string|Role  $role
     * @return  bool
     */
    public function is(string|Role $role): bool
    {
        return $this->value === is_string($role) ? $role : $role->value;
    }
}
