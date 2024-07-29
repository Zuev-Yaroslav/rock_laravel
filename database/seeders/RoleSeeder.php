<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::firstOrCreate(['name' => 'user']);
        Role::firstOrCreate(['name' => 'admin']);
        Role::firstOrCreate(['name' => 'post_moderator', 'entity' => 'post']);
        Role::firstOrCreate(['name' => 'video_moderator', 'entity' => 'video']);
        Role::firstOrCreate(['name' => 'product_moderator', 'entity' => 'product']);
    }
}
