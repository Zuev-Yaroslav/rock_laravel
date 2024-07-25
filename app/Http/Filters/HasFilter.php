<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

trait HasFilter
{
    public function scopeFilter(Builder $builder, $data) : Builder
    {
        $ClassName = "App\\Http\\Filters\\" . class_basename($this) . 'Filter';
//        return (new $ClassName())->apply($builder, $data);
        return app()->make($ClassName)->apply($builder, $data);
    }
}
