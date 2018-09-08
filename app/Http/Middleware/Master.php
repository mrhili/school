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

        if( Auth::check() || Auth::user()->role == 6 ){

          if( Application::setDebuggar( Auth::user()->role ) ){
            Debugbar::enable();
          }
            return $next($request);


        }else{

            return redirect('/');

        }
    }
}
