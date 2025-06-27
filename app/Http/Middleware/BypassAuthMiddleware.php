<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;

class BypassAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // If user is not logged in, log them in as the default user
        if (!Auth::check()) {
            $user = User::where('email', 'test@example.com')->first();
            
            // If user doesn't exist, create it
            if (!$user) {
                $user = User::create([
                    'name' => 'Default User',
                    'email' => 'test@example.com',
                    'password' => bcrypt('password'),
                ]);
            }
            
            Auth::login($user);
        }

        return $next($request);
    }
}