<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = [
            'username' => 'admin',
            'email'    => 'admin@mail.com',
            'password' => password_hash('password', PASSWORD_DEFAULT),
            'name'     => 'Admin',
            'role'     => 2,
            'is_active' => User::IS_ACTIVE
        ];

        User::create($admin);
    }
}
