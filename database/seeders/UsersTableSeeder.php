<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'id' => 1,
                'role_id' => 1, // admin
                'name' => 'admin',
                'email' => 'admin@sample.com',
                'password' => Hash::make('11111111'), // Hash
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'id' => 2,
                'role_id' => 2, // user
                'name' => 'user01',
                'email' => 'user01@sample.com',
                'password' => Hash::make('11111111'), // Hash
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'id' => 3,
                'role_id' => 2, // user
                'name' => 'user02',
                'email' => 'user02@sample.com',
                'password' => Hash::make('11111111'), // Hash
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'id' => 4,
                'role_id' => 2, // user
                'name' => 'user03',
                'email' => 'user03@sample.com',
                'password' => Hash::make('11111111'), // Hash
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'id' => 5,
                'role_id' => 2, // user
                'name' => 'user04',
                'email' => 'user04@sample.com',
                'password' => Hash::make('11111111'), // Hash
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'id' => 6,
                'role_id' => 2, // user
                'name' => 'user05',
                'email' => 'user05@sample.com',
                'password' => Hash::make('11111111'), // Hash
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'id' => 7,
                'role_id' => 2, // user
                'name' => 'user6',
                'email' => 'user6@sample.com',
                'password' => Hash::make('11111111'), // Hash
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'id' => 8,
                'role_id' => 2, // user
                'name' => 'user7',
                'email' => 'user7@sample.com',
                'password' => Hash::make('11111111'), // Hash
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'id' => 9,
                'role_id' => 2, // user
                'name' => 'user8',
                'email' => 'user8@sample.com',
                'password' => Hash::make('11111111'), // Hash
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'id' => 10,
                'role_id' => 2, // user
                'name' => 'user9',
                'email' => 'user9@sample.com',
                'password' => Hash::make('11111111'), // Hash
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'id' => 11,
                'role_id' => 2, // user
                'name' => 'user10',
                'email' => 'user10@sample.com',
                'password' => Hash::make('11111111'), // Hash
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'id' => 12,
                'role_id' => 2, // user
                'name' => 'user11',
                'email' => 'user11@sample.com',
                'password' => Hash::make('11111111'), // Hash
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'id' => 13,
                'role_id' => 2, // user
                'name' => 'user12',
                'email' => 'user12@sample.com',
                'password' => Hash::make('11111111'), // Hash
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'id' => 14,
                'role_id' => 2, // user
                'name' => 'user13',
                'email' => 'user13@sample.com',
                'password' => Hash::make('11111111'), // Hash
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'id' => 15,
                'role_id' => 2, // user
                'name' => 'user14',
                'email' => 'user14@sample.com',
                'password' => Hash::make('11111111'), // Hash
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'id' => 16,
                'role_id' => 2, // user
                'name' => 'user15',
                'email' => 'user15@sample.com',
                'password' => Hash::make('11111111'), // Hash
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
        ];

        $this->user->insert($users);
    }
}
