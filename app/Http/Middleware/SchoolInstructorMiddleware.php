<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SchoolInstructorMiddleware
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
        if(Auth::user()->usertype == 'schoolInstructor')
        {
            return $next($request);
        }
        else
        {
            return redirect('/home')->with('status', 'Õigused koolipoolse juhendaja vaatele puuduvad');
        }

    }
}
