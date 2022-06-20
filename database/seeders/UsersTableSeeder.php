<?php

namespace Database\Seeders;

use App\Enums\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()
            ->when(User::count() === 0, function ($factory) {
                $factory->create([
                    'name'  => 'Admin',
                    'email' => 'admin@admin.com',
                    'role'  => Role::ADMIN,
                ]);
            })
            ->count(10)
            ->create();
    }
}
