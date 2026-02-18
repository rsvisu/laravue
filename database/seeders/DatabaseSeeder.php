<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seeders para producción y local
        $this::call([
            RolesSeeder::class,
        ]);

        // Seeders para local
        if (app()->environment('local')) {
            User::factory()->create([
                'id' => 1,
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => bcrypt('Admin1234')
            ])->assignRole('admin');
        }
    }
}

