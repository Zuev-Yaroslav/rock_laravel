<?php

namespace App;

use App\Events\Log\EndLogEvent;
use App\Events\Log\StartLogEvent;
use App\Models\Logger;
use Illuminate\Database\Eloquent\Model;

trait HasLog
{
    private static array $oldValues = [];
    private static function getModelName(Model $model) : string
    {
        return strtolower(class_basename($model));
    }

    public static function getOldValues(Model $model): array
    {
        $oldValues = self::$oldValues;
//        if (self::$oldValues['id'] === $model->id) {
//            $oldValues = self::$oldValues;
//        } else {
//            $oldValues = $model->toArray();
//        }
        return $oldValues;
    }
    protected static function bootHasLog() : void
    {
        static::created(function (Model $model) {
//            StartLogEvent::dispatch();
            Logger::create([
                'event_name' => self::getModelName($model) . '_created',
                'new_values' => json_encode($model)
            ]);
//            EndLogEvent::dispatch();
        });
        static::updated(function (Model $model) {
//            StartLogEvent::dispatch();
            $oldValues = self::getOldValues($model);
            Logger::create([
                'event_name' => self::getModelName($model) . '_updated',
                'new_values' => json_encode($model),
                'old_values' => json_encode($oldValues)
            ]);
//            EndLogEvent::dispatch();
        });
        static::deleted(function (Model $model) {
//            StartLogEvent::dispatch();
            Logger::create([
                'event_name' => self::getModelName($model) . '_deleted',
                'old_values' => json_encode($model)
            ]);
//            EndLogEvent::dispatch();
        });
        static::retrieved(function (Model $model) {
//            StartLogEvent::dispatch();
            self::$oldValues = $model->toArray();
            Logger::create([
                'event_name' => self::getModelName($model) . '_retrieved',
                'old_values' => json_encode($model)
            ]);
//            EndLogEvent::dispatch();
        });
        parent::booted();
    }
}
