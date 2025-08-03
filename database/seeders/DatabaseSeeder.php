<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
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
        Role::create([
            'name' => 'admin',
            'description' => 'Administrator role with full access',
        ]);
        Role::create([
            'name' => 'editor',
            'description' => 'Editor role with limited access',
        ]);
        Role::create([
            'name' => 'user',
            'description' => 'Viewer role with read-only access',
        ]);
    }
}
