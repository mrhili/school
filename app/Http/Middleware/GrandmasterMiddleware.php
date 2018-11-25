<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Debugbar;
use Application;

class GrandmasterMiddleware
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
      if( Auth::check() ){

        if( Auth::user()->role >= 7){

          return $next($request);

        }
      }


      return redirect('/');
    }
}
