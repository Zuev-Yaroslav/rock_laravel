<?php

namespace App\LogChannels;

use App\LoggerFormatters\DefaultLoggerFormatter;
use Illuminate\Support\Facades\Log;
use Psr\Log\LoggerInterface;

class LogChannel
{
    public static string $formatter = DefaultLoggerFormatter::class;
    public static function build(string $name) : LoggerInterface
    {
        return Log::build([
            'driver' => 'single',
            'tap' => [self::$formatter],
            'path' => storage_path("logs/{$name}.log"),
        ]);
    }
}
