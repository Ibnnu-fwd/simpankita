<?php

namespace Database\Seeders;

use App\Models\DetailUser;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'username' => 'admin',
            'email'    => 'admin@mail.com',
            'password' => password_hash('password', PASSWORD_DEFAULT),
            'role'     => User::ROLE_ADMIN,
        ]);

        DetailUser::create([
            'user_id'    => $user->id,
            'name'       => 'Admin',
            'avatar'     => null,
            'address'    => 'Jember',
            'sex'        => 1,
            'job'        => 'Programmer',
            'phone'      => '081234567890',
            'birth_date' => '2002-01-01',
            'created_by' => $user->id,
            'updated_by' => $user->id
        ]);
    }
}
