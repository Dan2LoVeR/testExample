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
        \App\Models\Category::create(['name' => 'легкий']);
        \App\Models\Category::create(['name' => 'хрупкий']);
        \App\Models\Category::create(['name' => 'тяжелый']);
    }
}
