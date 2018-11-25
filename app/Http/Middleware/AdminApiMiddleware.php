<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class AdminApiMiddleware
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

        if( Auth::user()->role >= 5){

          return $next($request);

        }
      }

      return response()->json(['message' => 'You are not authorized'],401);

    }
}
