<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthIdMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $authId = $request->header('Auth-User-Id');
        if ($authId){
            app()->singleton('auth_id', function () use ($authId) {
                return $authId;
            });
            return $next($request);
        }
        else
            return response()->apiFail('Unauthenticated user', 403);




    }
}
