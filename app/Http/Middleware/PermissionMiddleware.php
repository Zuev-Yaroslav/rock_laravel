<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response|JsonResponse
    {
        $permissions = ['index', 'store', 'show', 'update', 'destroy'];
        $permission = Route::getCurrentRoute()->getActionMethod();
        if (in_array($permission, $permissions)) {
            if (auth()->user()->getIsSomePermission($request->entity .'_'. $permission)) {
                return $next($request);
            }
        }
        return response([
            'message' => 'forbidden'
        ], \Illuminate\Http\Response::HTTP_FORBIDDEN);
    }
}
