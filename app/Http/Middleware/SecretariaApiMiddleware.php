<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class SecretariaApiMiddleware
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

        if( Auth::user()->role >= 4){

          return $next($request);

        }
      }

      return response()->json(['message' => 'You are not authorized'],401);

    }
}
