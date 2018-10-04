<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{
  CMS,
  Page
};
class PageController extends Controller
{
    //
    public function facade( CMS $cms ){





      if($cms->page){

        return view('cms.page' )->with('page', $cms->page );

      }else{
        $title = '404';
        $message = 'Page not found';
        return response()->view('errors.error',compact('title', 'message'),404);
      }



    }
}
