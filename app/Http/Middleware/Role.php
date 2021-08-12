<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
     {
        $userRole = $request->user()->role->name;
        if ($userRole === 'admin') {
           // return redirect()-route('admin');
            return $next($request);
        }
        return redirect()->route('welcome');







    }
}
