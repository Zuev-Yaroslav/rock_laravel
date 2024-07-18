<?php

namespace App\Observers;

use App\Models\Logger;
use App\Models\Post;

class PostObserver
{
    /**
     * Handle the Post "created" event.
     */
    private static array $oldValues = [];

    public static function getOldValues(Post $post): array
    {
        if (self::$oldValues['id'] === $post->id) {
            $oldValues = self::$oldValues;
        } else {
            $oldValues = $post->toArray();
        }
        return $oldValues;
    }

    public function created(Post $post): void
    {
        Logger::create([
            'event_name' => 'post_created',
            'new_values' => json_encode($post)
        ]);
    }

    /**
     * Handle the Post "updated" event.
     */
    public function updated(Post $post): void
    {
        $oldValues = self::getOldValues($post);
        Logger::create([
            'event_name' => 'post_updated',
            'new_values' => json_encode($post),
            'old_values' => json_encode($oldValues)
        ]);
    }

    /**
     * Handle the Post "deleted" event.
     */
    public function deleted(Post $post): void
    {
        Logger::create([
            'event_name' => 'post_deleted',
            'old_values' => json_encode($post)
        ]);
    }

    /**
     * Handle the Post "restored" event.
     */
    public function restored(Post $post): void
    {
        //
    }

    /**
     * Handle the Post "force deleted" event.
     */
    public function forceDeleted(Post $post): void
    {
        //
    }

    public function retrieved(Post $post): void
    {
        self::$oldValues = $post->toArray();
        Logger::create([
            'event_name' => 'post_retrieved',
            'old_values' => json_encode($post)
        ]);

    }
}
