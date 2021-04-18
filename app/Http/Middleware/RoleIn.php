<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleIn
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $roles)
    {
        if (auth()->check()) {
            if (auth()->user()->hasRole($roles)) {
                return $next($request);
            }
            return redirect('/');
        }

        return redirect('login');
    }
}
