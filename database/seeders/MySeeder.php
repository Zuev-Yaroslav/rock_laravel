<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Profile;
use App\Models\Role;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::insert([['name' => 'admin'], ['name' => 'user']]);
        User::create(
            ['id' => 1, 'name' => 'yaroslav', 'email' => 'yaroslav@gmail.com', 'password' => '1'],
        );
        Profile::insert([
            ['login' => 'yaroslav_admin', 'user_id' => 1, 'role_id' => 1],
            ['login' => 'yaroslav_user', 'user_id' => 1, 'role_id' => 2],
            ['login' => 'yaroslav_admin2', 'user_id' => 1, 'role_id' => 1],
        ]);
        Category::create(['title' => 'some cat']);
        Tag::insert([
            ['title' => 'some tag'],
            ['title' => 'some tag2'],
        ]);
        $post = Post::create([
            'title' => 'some post',
            'profile_id' => 1,
            'category_id' => 1,
        ]);
        $post->tags()->attach([1, 2]);
        $post->comments()->createMany([
            ['content' => 'hello', 'profile_id' => 2],
            ['content' => 'good content', 'profile_id' => 3],
        ]);
    }
}
