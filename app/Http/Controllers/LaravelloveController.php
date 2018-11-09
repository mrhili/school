<?php

namespace App\Http\Controllers;

use App\{
    Post,
    User
};
use Illuminate\Http\Request;
use Auth;
class LaravelloveController extends Controller
{
    //
    public function switch( Post $post){

        $user = Auth::user();

        if( $user->hasLiked($post  ) ){
            $post->unlikeBy($user->id);
        }else{
            $post->likeBy($user->id);
        }

        return response()->json([
            'post'  => $post,
            'state'  => $user->hasLiked($post)
        ]);

        //

    }
}
