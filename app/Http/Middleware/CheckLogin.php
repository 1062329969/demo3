<?php

namespace App\Http\Middleware;

use Closure;

class CheckLogin
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
        $name = $request->session()->get('name');
        if($name){
            return $next($request);
        }else{
            return redirect('/userlogin');
        }
//        return $next($request);
    }
}
