<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    private $user;

    public function __construct(User $user){
        $this->user = $user;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'role_id' => 1, // admin
                'name' => 'admin',
                'email' => 'admin@sample.com',
                'password' => Hash::make('11111111'), // Hash
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'role_id' => 2, // user
                'name' => 'user01',
                'email' => 'user01@sample.com',
                'password' => Hash::make('11111111'), // Hash
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'role_id' => 2, // user
                'name' => 'user02',
                'email' => 'user02@sample.com',
                'password' => Hash::make('11111111'), // Hash
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'role_id' => 2, // user
                'name' => 'user03',
                'email' => 'user03@sample.com',
                'password' => Hash::make('11111111'), // Hash
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'role_id' => 2, // user
                'name' => 'user04',
                'email' => 'user04@sample.com',
                'password' => Hash::make('11111111'), // Hash
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'role_id' => 2, // user
                'name' => 'user05',
                'email' => 'user05@sample.com',
                'password' => Hash::make('11111111'), // Hash
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'role_id' => 2, // user
                'name' => 'user06',
                'email' => 'user06@sample.com',
                'password' => Hash::make('11111111'), // Hash
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'role_id' => 2, // user
                'name' => 'user07',
                'email' => 'user07@sample.com',
                'password' => Hash::make('11111111'), // Hash
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'role_id' => 2, // user
                'name' => 'user08',
                'email' => 'user08@sample.com',
                'password' => Hash::make('11111111'), // Hash
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'role_id' => 2, // user
                'name' => 'user09',
                'email' => 'user09@sample.com',
                'password' => Hash::make('11111111'), // Hash
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'role_id' => 2, // user
                'name' => 'user10',
                'email' => 'user10@sample.com',
                'password' => Hash::make('11111111'), // Hash
                'created_at' => NOW(),
                'updated_at' => NOW()
            ]
        ];

        $this->user->insert($users);
    }
}
