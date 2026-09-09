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
class VideoController extends Controller
{
    //
    public function list(){
        $tabs = [];
        $tabsObj = Videotab::all();

        $items = Video::all();





        if( $tabsObj->count()  > 0){

            foreach ($tabsObj as $tab){
                    $tabs[ $tab->id ] = $tab->page->title .' -> '. $tab->title ;
            }
            return view( 'back.videos.list', compact('tabs', 'items') );
        }else{
            return view('outils.message')->with('message_array', ['il ya pas des video tabs']);

        }


    }


    public function store(Request $request,  Videotab $tab){

        $video = Video::create([
            'title' => $request->title,
            'url' => $request->url,
            'text' => $request->text,
           // 'slug' => str_slug( $request->title ),
            'roles' => json_encode( $request->roles ),
            'videotab_id' => $tab->id,
        ]);

        if($video){
            return response()->json($video->toArray());
        }
    }

}
