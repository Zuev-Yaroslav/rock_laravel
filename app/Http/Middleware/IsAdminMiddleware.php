<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class IsAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response|JsonResponse
    {
        if (auth()->user()->is_admin) {
            return $next($request);
        }
        return response([
            'message' => 'forbidden'
        ], Response::HTTP_FORBIDDEN);
    }
}
