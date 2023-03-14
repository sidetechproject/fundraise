<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Schema;

class CheckPermissions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {        
        if($request->getRequestUri() != '/register' && !isRoute('home') && !isRoute('login') && !isRoute('signup') && !isRoute('signin') && $request->route()->uri != 'login' && !auth()->user()){
            return redirect(route('signup'))->with('success', 'Update startup success!');
        }

        return $next($request);
    }
}
