<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Admin',
        //     'email' => 'admin@example.com',
        // ]);

        \App\Models\Appointment::factory(10)->create();
        \App\Models\Category::factory(10)->create();
        \App\Models\Currency::factory(10)->create();
        \App\Models\Medicine::factory(10)->create();
        \App\Models\Patient::factory(10)->create();
        \App\Models\Report::factory(10)->create();
        \App\Models\Service::factory(10)->create();
    }
}
