<?php

namespace Database\Seeders;

use App\Models\Category;
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
        $user = User::firstOrCreate([
            'email' => 'user@example.com'
        ],[
            'name' => 'admin',
            'password' => Hash::make('12345678'),
            'role_id' => Role::where('name', 'admin')->first()->id
        ]);
//        Profile::firstOrCreate([
//            'login' => 'super_user'
//        ],[
//            'user_id' => $user->id,
//        ]);
        $user->profile()->firstOrCreate(['login' => 'super_user']);
        $users = User::factory(50)->create();
        $users->each(function (User $user) {
            Profile::factory()->create(['user_id' => $user->id]);
//            Profile::factory()->create(['profileable_id' => $user->id, 'profileable_type' => User::class]);
//            $user->profile()->factory()->firstOrCreate();
        });
        $this->call([
            CategorySeeder::class,
            TagSeeder::class,
            PostSeeder::class,
            ProductSeeder::class
        ]);

    }
}
