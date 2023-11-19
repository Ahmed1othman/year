<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class LanguageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $supportedLanguages = ['en', 'ar']; //supported languages
        $requestedLanguage = $request->header('Accept-Language');
        if (in_array($requestedLanguage, $supportedLanguages)) {
            App::setLocale($requestedLanguage); // Set the application's locale
        } else {
            App::setLocale('ar'); // default application's locale
        }
        return $next($request);
    }
}
