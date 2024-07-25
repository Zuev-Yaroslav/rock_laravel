<?php

namespace App\Console\Commands;

use App\Events\Log\EndLogEvent;
use App\Events\Log\StartLogEvent;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Profile;
use App\Models\Role;
use App\Models\User;
use Illuminate\Console\Command;

class GoCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'go';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
//        $user = User::first();
//        $post = Post::first();
//        $role = Role::where('name', 'admin')->first();
//        $category = Category::first();
//        $comment = $post->comments()->first();
//        $profile2 = Profile::find(2);
//        dd($category->comments->toArray());
//        dd($role->users->count());
//        dd($role->profiles->count());
//        dd($role->profiles[0]);
//        dd($comment->category);
//        dd($comment->commentable->toArray());
//        dd($profile2->likedPosts->toArray());
//        dd($post->likedByProfiles()->first()->likedPosts);
//        $post = Post::first();
//        $post->likedByProfiles()->attach([1, 5, 23, 27]);
//        $post2 = Post::find(2);
//        $post2->likedByProfiles()->sync([4, 7, 13, 17]);
//        $post3 = Post::find(3);
//        $post3->likedByProfiles()->syncWithoutDetaching([1, 2, 3]);
//        $post3->likedByProfiles()->detach([3]);
//        $post4 = Post::find(4);
//        $post4->likedByProfiles()->toggle([7]);
//        $post5 = Post::find(5);
//        $post2->likedByProfiles()->updateExistingPivot([4,7], [
//            'type' => 'smile',
//        ]);
//        dd($post->likedByProfiles->count());
//        dd(Post::first());
//        $post = Post::find(10);
//        $post->update(['title' => '3333333333']);
//        $post->tags()->sync([]);
//        $post->delete();
//        dd($post->getDirty());
//        $post->update();
//        StartLogEvent::dispatch();
//        EndLogEvent::dispatch();

        $profile = Profile::first();
        dd($profile->role->name);
    }
}
