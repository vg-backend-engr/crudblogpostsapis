<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TokenMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
        return $next($request);
        // Check if the request has an Authorization header
        if (!$request->hasHeader('Authorization')) {
            return response()->json(['error' => 'Authorization header is missing'], 401);
        }

        // Extract the token from the Authorization header
        $token = $request->bearerToken();

        // Replace 'hello12345' with your actual token logic
        if ($token !== env('API_KEY')) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Proceed with the request
        return $next($request);
    }
}
