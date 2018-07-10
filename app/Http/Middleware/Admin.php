<?php

namespace App\Http\Middleware;

use Closure;

class Admin
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
        if(auth()->check()){
            if(auth()->user()->state == 0){
                return $next($request);
            }else{
                return redirect('/')->with('error','You have not admin access');
            }
        }

        return redirect('/')->with('error','You have not admin access');
    }
}
