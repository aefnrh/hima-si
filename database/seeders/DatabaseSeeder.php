<?php

namespace Database\Seeders;

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

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@uniku.ac.id',
            'password'=> bcrypt('password123'),
        ]);

        $this->call([
            SettingsSeeder::class,
            DivisionsSeeder::class,
            KabinetSeeder::class,
            ClubsSeeder::class,
            GallerySeeder::class,
        ]);
    }
}
