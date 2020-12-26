<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class setLocaleMiddleware
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
        if((request()->has('diraction') and request()->diraction == 'rtl') or session('diraction') == 'rtl'){
            Config::set('app.diraction' , 'rtl');
            Config::set('app.locale' , 'ar');
        }
        return $next($request);
    }
}
