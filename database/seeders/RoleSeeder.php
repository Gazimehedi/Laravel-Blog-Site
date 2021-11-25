<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'position' => "Owner",
        ]);
        Role::create([
            'position' => "Admin",
        ]);
        Role::create([
            'position' => "Editor",
        ]);
        Role::create([
            'position' => "User",
        ]);
    }
}
