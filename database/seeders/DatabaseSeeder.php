<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            "name" => "Alice",
            "email" => "alice@gmail.com",
        ]);
        User::factory()->create([
            "name" => "Bob",
            "email" => "bob@gmail.com",
        ]);
        User::factory()->create([
            "name" => "John",
            "email" => "john@gmail.com",
        ]);

        $list = ['Earth', 'Ocean', 'Foods', 'English', 'Coding', 'Maths', 'Health', 'Cycle', 'General Knowledge'];
        foreach ($list as $name) {
            \App\Models\Category::factory()->create(['name' => $name]);
        }
    }
}
