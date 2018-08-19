<?php

namespace App\Http\Middleware;

use Closure;

use Session;

use App\Year;

use Application;

class SetYear
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

        Application::setYear();


        return $next($request);
    }
}
