<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{
    Videopage,
    Videotab,
    Video,
    User
};

use Auth;

class VideopageController extends Controller
{
    //
    public function display($page = null, $tab = null){


        $pages = null;
        $tabs = null;
        $selected_page = null;
        $selected_tab = null;

        if($page != null ){

            $selected_page = Videopage::where('slug', $page)->first();

            if( ! preg_match("/". Auth::user()->role ."/i", $selected_page->roles)){
                return view('outils.message')->with('message_array', ['Tu peut pas voire cette page']);

            }



            $tabs = $selected_page->tabs()->where('roles', 'LIKE', '%'. Auth::user()->role .'%' )->get();

            if($tab != null){

                $selected_tab = Videotab::where('slug', $tab)->first();
                if( ! preg_match("/". Auth::user()->role ."/i", $selected_tab->roles)){
                    return view('outils.message')->with('message_array', ['Tu peut pas voire cette page']);

                }
                $tabs = $selected_tab->page->tabs()->where('roles', 'LIKE', '%'. Auth::user()->role .'%' )->get();

            }

        }


        $pages = Videopage::where('roles', 'LIKE', '%'. Auth::user()->role .'%' )->get();
        $paginate = 10;
        return view('back.videos.display', compact('pages', 'tabs', 'selected_page','selected_tab', 'paginate'));


    }







    public function list(){

        $items = Videopage::all();

        return view( 'back.videopages.list', compact('items') );

    }


    public function store(Request $request){

        $matches = explode('fa-', $request->icon );

        $videopage = Videopage::create([
            'title' => $request->title,
            'slug' => str_slug( $request->title ),
            'icon' => $matches[1] ,
            'roles' => json_encode($request->roles)
        ]);

        if($videopage){
            return response()->json($videopage->toArray());
        }

    }














}
