<?php

namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;

class ProfileFilter extends AbstractFilter
{
    protected array $keys = [
        'gender',
        'birthed_at_from',
        'birthed_at_to',
        'first_name',
        'second_name',
        'third_name',
        'login',
        'role_name',
    ];
    protected function birthedAtFrom(Builder $builder, $value)
    {
        $builder->where('birthed_at', '>=', $value);
    }
    protected function birthedAtTo(Builder $builder, $value)
    {
        $builder->where('birthed_at', '<=', $value);
    }
    protected function gender(Builder $builder, $value)
    {
        $builder->where('gender', $value);
    }
    protected function firstName(Builder $builder, $value)
    {
        $builder->where('first_name', 'ilike', "%$value%");
    }
    protected function secondName(Builder $builder, $value)
    {
        $builder->where('second_name', 'ilike', "%$value%");
    }
    protected function thirdName(Builder $builder, $value)
    {
        $builder->where('third_name', 'ilike', "%$value%");
    }

    protected function login(Builder $builder, $value)
    {
        $builder->where('login' , 'ilike', "%$value%");
    }
    protected function roleName(Builder $builder, $value)
    {
        $builder->whereRelation('role', 'name' , 'ilike', "%$value%");
    }
}
