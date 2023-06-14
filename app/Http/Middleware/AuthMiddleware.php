<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->header('token');
        if ($token == env("APP_TOKEN")) {
            return $next($request);
        }
        $response = [
            'data' => null,
            'message' => "You dont have access, token required",
        ];
        return response()->json($response, 401);
    }
}
