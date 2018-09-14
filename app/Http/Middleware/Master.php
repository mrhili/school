<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Debugbar;
use Application;
class Master
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

        if( Auth::user()->role >= 6){

          return $next($request);

        }
      }

      return redirect('/');

    }
}
