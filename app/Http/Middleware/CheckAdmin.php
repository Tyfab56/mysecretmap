<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {


        if (!auth()->user()) {
            return redirect('login');
        } else {
            if (!auth()->user()->isAdmin()) {

                return redirect('/');
            } else {
                return $next($request);
            }
        }
    }
}
