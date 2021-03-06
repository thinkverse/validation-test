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
                    'username' => 'admin',
                    'email' => 'admin@admin.com',
                    'role'  => Role::ADMIN,
                ]);
            })
            ->when(app()->environment('local'), function ($factory) {
                $factory->count(10)->create();
            });
    }
}
