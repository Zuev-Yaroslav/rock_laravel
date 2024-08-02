<?php

namespace App;

use App\Events\Log\EndLogEvent;
use App\Events\Log\StartLogEvent;
use App\LogChannels\LogChannel;
use App\Models\Logger;
use Illuminate\Database\Eloquent\Model;

trait HasLog
{
    private static array $oldValues = [];
    private static function getModelName(Model $model) : string
    {
        return strtolower(class_basename($model));
    }

    private static function getOldValues(): array
    {
        return self::$oldValues;
    }
    protected static function bootHasLog() : void
    {
        static::created(function (Model $model) {
            LogChannel::build(self::getModelName($model) . '-created')
                ->info(self::getModelName($model) . ' was created', [$model]);
        });
        static::updated(function (Model $model) {
            $oldValues = self::getOldValues();
            LogChannel::build(self::getModelName($model) . '-updated')
                ->info(self::getModelName($model) . ' was updated',
                    ['old_values' => $oldValues, 'new_values' => $model]);
        });
        static::deleted(function (Model $model) {
            LogChannel::build(self::getModelName($model) . '-deleted')
                ->info(self::getModelName($model) . ' was deleted', [$model]);
        });
        static::retrieved(function (Model $model) {
            self::$oldValues = $model->toArray();
            LogChannel::build(self::getModelName($model) . '-retrieved')
                ->info(self::getModelName($model) . ' was retrieved', [$model]);
        });
    }
}
