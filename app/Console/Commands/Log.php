<?php

namespace App\Console\Commands;

use App\LogChannels\LogChannel;
use App\Models\Post;
use Illuminate\Console\Command;

class Log extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'log';

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
        LogChannel::build('post-created')->info('post created');
        LogChannel::build('post-updated')->info('post updated');
    }
}
