<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Profile;
use App\Models\Tag;
use App\Models\Video;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $videos = Video::factory(50)->create();
        $tags = Tag::all();
        $profiles = Profile::all();
        $videos->each(function (Video $video) use ($tags, $profiles) {
            $video->tags()->attach($tags->random(rand(1, 10))->pluck('id'));
            Comment::factory(random_int(1, 10))->create([
                'commentable_id' => $video->id,
                'commentable_type' => Video::class,
            ]);
            $video->likedByProfiles()->attach($profiles->random(rand(1, 51))->pluck('id'));
        });
    }
}
