<?php

namespace App\Enums;

enum Role: string
{
    case ADMIN = 'admin';
    case USER = 'user';

    /**
     * Check if the given role is in the list of roles.
     *
     * @param  array<int, string|enum-string>  $roles
     * @return  bool
     */
    public function in(array $roles): bool
    {
        return in_array($this->value, array_map(fn ($role) => $this->unpack($role), $roles));
    }

    /**
     * Check if the given role matches a role.
     *
     * @param  string|Role  $role
     * @return  bool
     */
    public function is(string|Role $role): bool
    {
        return $this->value === $this->unpack($role);
    }

    /**
     * Unpack a role from a string or enum.
     *
     * @param  string|Role  $role
     * @return  string
     */
    protected function unpack(string|Role $role): string
    {
        if ($role instanceof Role) {
            $role = $role->value;
        }

        return $role;
    }
}
