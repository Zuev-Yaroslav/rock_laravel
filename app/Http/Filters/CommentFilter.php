<?php

namespace App\Http\Filters;


use App\Models\Post;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;

class CommentFilter extends AbstractFilter
{
    protected array $keys = [
        'content',
        'profile_login',
        'post_title',
        'product_title',
        'commentable_type',
        'commentable_title',
        'created_at_from',
        'created_at_to',
    ];
    protected function createdAtFrom(Builder $builder, $value)
    {
        $builder->where('created_at', '>=', $value);
    }
    protected function createdAtTo(Builder $builder, $value)
    {
        $builder->where('created_at', '<=', $value);
    }
    protected function content(Builder $builder, $value)
    {
        $builder->where('content', 'ilike', "%$value%");
    }
    protected function postContent(Builder $builder, $value)
    {
        $builder->whereMorphRelation('commentable', [Post::class], 'content','ilike', "%$value%");
    }
    protected function commentableTitle(Builder $builder, $value)
    {
        $builder->whereMorphRelation('commentable' , [Post::class, Product::class], 'title', 'ilike', "%$value%");
    }
    protected function commentableType(Builder $builder, $value)
    {
        $value = "App\\Models\\" . ucfirst(strtolower($value));
        $builder->where('commentable_type', $value);
    }
}
