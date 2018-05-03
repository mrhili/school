<?php

namespace App\Http\Middleware;

use Closure;

use Session;

use App\Year;

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

        if( Session::get('yearName') && Session::get('yearId')  ){

        }else{

            $year = Year::where('min', date("Y") )->first();

            Session::put('yearName', $year->name );
            Session::put('yearId', $year->id );
        }


        return $next($request);
    }
}
