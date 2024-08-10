<?php

namespace Database\Seeders;

// use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        # Call seed files
        $this->call([
            UsersTableSeeder::class,
            AreasTableSeeder::class,
            PrefecturesTableSeeder::class,
            CategoriesTableSeeder::class,
            NGWordsSeeder::class,
        ]);
    }
}
