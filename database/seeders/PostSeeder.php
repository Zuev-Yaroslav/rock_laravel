<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Profile;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = Post::factory(100)->create();
        $tags = Tag::all();
        $profiles = Profile::all();
        $posts->each(function (Post $post) use ($tags, $profiles) {
//            $post->likedByProfiles()->attach($profiles->random(rand(1, 51))->pluck('id'));
            $post->tags()->attach($tags->random(10)->pluck('id'));
            Comment::factory(random_int(1, 50))->create([
                'commentable_id' => $post->id,
                'commentable_type' => Post::class,
            ]);
        });

    }
}
