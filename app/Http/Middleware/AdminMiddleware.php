<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Auth;

class AdminMiddleware
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
        if ( !Auth::user()->isAdmin() ) {
            return redirect('/');
        }
        return $next($request);
    }
}
