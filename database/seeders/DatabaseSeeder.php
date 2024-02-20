<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        
        \App\Models\User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            "password" => Hash::make("admin"),
            "roles" => "superadmin"
        ]);

        \App\Models\Faculty::factory(1)->create();
        \App\Models\Building::factory(1)->create();
        \App\Models\AcademicYear::factory(1)->create();
    }
}
