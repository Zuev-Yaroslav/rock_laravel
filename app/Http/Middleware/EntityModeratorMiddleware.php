<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class EntityModeratorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response|JsonResponse
    {
        $entities = ['post', 'product', 'video'];
        preg_match("/(posts)|(products)|(videos)/", $request->path(), $m);
        $entity = $m[0];
        $entity = Str::singular($entity);
        $request->entity = $entity;
        $attr = 'is_' . $entity . '_moderator';
        if (in_array($entity, $entities)) {
            if (auth()->user()->$attr) {
                return $next($request);
            }
        }
        return response([
            'message' => 'forbidden'
        ], Response::HTTP_FORBIDDEN);
    }
}
