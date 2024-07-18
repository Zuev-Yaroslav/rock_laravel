<?php

namespace App\Console\Commands;

use App\Models\Post;
use App\Models\Product;
use App\Models\Profile;
use Illuminate\Console\Command;

class TestModelEvents extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test-model-events';

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
//        Post::create([
//            'title' => '111',
//            'profile_id' => 1,
//            'category_id' => 1,
//        ]);
        $post = Post::find(25);
//        dd($post);
        $post->update(['title' => 'hello world2fwefewfeddddfw88989']);
//        $post->tags()->sync([]);
//        $post->delete();
//        $profile = Profile::find(10);
//        $profile->update(['login' => 'hello3world']);
//        $product = Product::create(['title'=> 'fwfwfwffwfwf']);
//        Post::create(['title' => '111', 'profile_id' => 1, 'category_id' => 2, 'content' => '111']);

    }
}
