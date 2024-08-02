<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Permission;
use App\Models\Post;
use App\Models\Role;
use App\Models\Tag;
use App\Models\User;
use App\Models\Profile;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use function Symfony\Component\String\u;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);
        $user = User::firstOrCreate([
            'email' => 'user@example.com'
        ],[
            'name' => 'admin',
            'password' => Hash::make('12345678'),
        ]);
        $admin = Role::where('name', 'admin')->first()->id;
        $user->roles()->sync($admin);
        $user->profile()->firstOrCreate(['login' => 'super_user']);

        $user = User::firstOrCreate([
            'email' => 'user@example.com'
        ],[
            'name' => 'admin',
            'password' => Hash::make('12345678'),
        ]);
        $rolesIds = Role::whereIn('name', ['post_moderator', 'admin'])->get()->pluck('id');
        $permissionsIds = Permission::where('entity', 'post')->get()->pluck('id');
        $user->roles()->sync($rolesIds);
        $user->permissions()->sync($permissionsIds);
        $user->profile()->firstOrCreate(['login' => 'super_user']);

        $this->call([
            ProfileSeeder::class,
            CategorySeeder::class,
            TagSeeder::class,
            PostSeeder::class,
            ProductSeeder::class,
            VideoSeeder::class,
        ]);

    }
}
