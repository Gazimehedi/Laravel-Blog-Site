<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(1)->create();
        \App\Models\Category::factory(6)->create();
        \App\Models\Tag::factory(10)->create();
        \App\Models\Post::factory(30)->create();

        $this->call([RoleSeeder::class]);
        $this->call([SettingSeeder::class]);
    }
}
