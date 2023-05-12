<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // $user = $request->user();

        // if (! $user) {
        //     return redirect()->route('login');
        // }

        // foreach ($roles as $role) {
        //     if ($user === $role) {
        //         return $next($request);
        //     }
        // }

        // return abort(403);

        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        if ($user->role_name == $roles) {
            return $next($request);
        } 

        return redirect()->route('login')->with('error', 'Anda tidak memiliki akses');
    }
}