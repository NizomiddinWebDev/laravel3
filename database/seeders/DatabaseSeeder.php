<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Application;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // Profile::factory(10000)->for(User::factory())->create();
        // Application::factory(500)->create();
        // User::factory(300)->create();
        $this->call([
            // RoleSeeder::class,
            // UserSeeder::class
            ProfileSeeder::class
        ]);
    }
}
