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


class VideotabController extends Controller
{




    public function list(){

        $items = Videotab::all();

        $videopages = Videopage::get(['title', 'id'])->pluck('title', 'id')->toArray();

        return view( 'back.videotabs.list', compact('items', 'videopages') );

    }


    public function store(Request $request){

        $matches = explode('fa-', $request->icon );

        $videotab = Videotab::create([
            'title' => $request->title,
            'slug' => str_slug( $request->title ),
            'icon' => $matches[1] ,
            'roles' => json_encode($request->roles),
            'videopage_id' => json_encode($request->videopage_id),
        ]);

        if($videotab){
            return response()->json( $videotab->toArray());
        }

    }




}
