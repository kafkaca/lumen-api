<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;

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
        $authUser = User::find($_SESSION['logged_id']);

        if ( !$authUser->isAdmin() ) {
            return redirect('/');
        }

        return $next($request);
    }
}
