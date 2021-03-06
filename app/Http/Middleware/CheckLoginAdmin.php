<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Spate\Permission\Models\Role;

class CheckLoginAdmin
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
        if(!Auth::check()){
            return redirect()->route('admin.login');
                
        }
        else
            if(Auth::check() && Auth::user()->hasRole('Customer')){
                return redirect()->route('admin.login');
            }
            else{
                return $next($request);
            }
    }
}
