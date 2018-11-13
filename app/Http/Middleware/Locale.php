<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use App;
use Carbon;
class Locale
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





        if ( Session::has('locale')) {

            App::setLocale( Session::get('locale') );
 
            // You also can set the Carbon locale
            Carbon::setLocale( Session::get('locale') );
        }else{

            App::setLocale( config('app.locale') );

            Session::put('locale', config('app.locale'));

            // You also can set the Carbon locale
            Carbon::setLocale( config('app.locale') );
        }



        $conversion = [
          'fr' => 'fr_FR',
          'en' => 'en_US',
          'ar' => 'ar_AR'
        ];



        Session::put('localeconverted', $conversion[ config('app.locale') ]);

 
        return $next($request);



        //dd(  $request->getPreferredLanguage(    ) );
        /*
        if(!session()->has('locale')) {
            session(
                [
                    'locale' => $request->getPreferredLanguage( config('app.locales')   )
                ]

                );
        }
        
        app()->setLocale(session('locale'));

        */



/************/
/*
$locale = session('locale');
$conversion = [
  'fr' => 'fr_FR',
  'en' => 'en_US',
  'ar' => 'ar_AR',
];
$locale = $conversion[$locale];

*/

/*****************/

/*


        setlocale(LC_TIME, session('locale'));
        return $next($request);*/
    }
}
