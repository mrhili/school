<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\{
  Post,
  User
};

use Auth;
class PostController extends Controller
{
    //
    public function create(){
/*
      $post = Post::create([
        'title' => 'Titre',
        'body' => 'Text',
        'type' => 0,
        'role' => 6,
        'user_id' => Auth::id(),
      ]);
*/
      //return view('back.posts.create', compact('post'));
      return view('back.posts.create');
    }



    public function index(){

      $posts = Post::where('role' , '>=' , Auth::user()->role )->get();

      return view('back.posts.index', compact('posts'));

    }
}
