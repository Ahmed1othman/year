<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class CheckServiceSecret
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        Log::info($request->headers);
        $expectedServiceSecret = config('service_setting.service_secret');
        if ($request->header('Service-Secret') != $expectedServiceSecret) {
            return response()->apiFail('Unauthorized', 401);
        }
        return $next($request);
    }
}
