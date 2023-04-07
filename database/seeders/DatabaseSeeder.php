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
        \App\Models\User::factory(20)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Admin',
        //     'email' => 'admin@example.com',
        // ]);

        \App\Models\Appointment::factory(20)->create();
        \App\Models\Category::factory(20)->create();
        \App\Models\Currency::factory(20)->create();
        \App\Models\Medicine::factory(20)->create();
        \App\Models\Patient::factory(20)->create();
        \App\Models\Report::factory(20)->create();
        \App\Models\Service::factory(20)->create();
        \App\Models\Invoice::factory(20)->create();
    }
}
