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

          $thisYear = date("Y");
          $year;

          if( date('n') < 8 ){

            $year = Year::firstOrCreate(['max' => $thisYear ], [
              'max' => $thisYear ,
              'min' => ($thisYear-1) ,
              'name' => ($thisYear-1).'/'.$thisYear
            ]);

          }else{

            $year = Year::firstOrCreate(['min' => $thisYear ], [
              'min' => $thisYear ,
              'max' => ($thisYear+1) ,
              'name' => $thisYear.'/'.($thisYear+1)
            ]);

          }
            Session::put('yearName', $year->name );
            Session::put('yearId', $year->id );
        }


        return $next($request);
    }
}
