<?php

namespace App\Http\Middleware;

use Closure;

class CheckDel
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
        if(false) {
            return redirect('listbody');
        } else {
            
            return $next($request);
        }
       
    }
}
