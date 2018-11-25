<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class LocalController extends Controller
{
    //
    //
    //
    //
    //
    //
    public function change(Request $request,String $locale){
      //set’s application’s locale
      $locale = array_key_exists($locale, config('app.locales')) ? $locale : config('app.fallback_locale');


      Session::put('locale', $locale);



      app()->setLocale($locale);

      alert()->success( config('app.locales')[ $locale ] , trans('languages.change'));


      return back();
   }






}
