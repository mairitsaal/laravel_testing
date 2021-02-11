<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SchoolMiddleware
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
        if(Auth::user()->usertype == 'school')
        {
            return $next($request);
        }
        else
        {
            return redirect('/home')->with('status', 'Õigused kooli vaatele puuduvad');
        }

    }
}

