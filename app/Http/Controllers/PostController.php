<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\{
  Post,
  User
};

use Auth;
use ArrayHolder;
class PostController extends Controller
{

  public function createImage(){
    return view('back.posts.create-images');
  }

  public function confirm(Request $request, Post $post){

    if($post->type == 1 ){

      $post->title = $request->title;
      $post->body = $request->body;
      $post->link = $request->link;
      $post->user_id = Auth::id();
      $post->confirmed = true;

      $post->save();

      return redirect()->route('posts.index');

    }else{
      return 'We can not confirm that kind';
    }

  }

  public function init($type){

    $post = Post::create([
      'title' => 'random'.str_random(15),
      'body' => 'random'.str_random(15),
      'user_id' => Auth::id(),
      'role' => 6,
      'type' => $type
    ]);
    if( $post ){
      return response()->json($post->toArray());
    }else{
      return response()->json(['message' => 'cant initialize test'], 500);
    }



  }


  public function createLink(){
    return view('back.posts.create-video');
  }

  public function postLink(Request $request){


    $post = Post::create([
      'title' => $request->title,
      'body' => $request->body,
      'link' => $request->link,
      'user_id' => Auth::id(),
      'role' => $request->role,
      'type' => 2,
      'confirmed' => true
    ]);



    if($post){

      return redirect()->route('posts.index');

    }

  }






    public function createVideo(){
      return view('back.posts.create-video');
    }

    public function postVideo(Request $request){


      $post = Post::create([
        'title' => $request->title,
        'body' => $request->body,
        'link' => $request->link,
        'user_id' => Auth::id(),
        'role' => $request->role,
        'type' => 2,
        'confirmed' => true
      ]);



      if($post){

        return redirect()->route('posts.index');

      }

    }

    public function createText(){
      return view('back.posts.create-text');
    }
    public function postText(Request $request){


      $post = Post::create([
        'title' => $request->title,
        'body' => $request->body,
        'user_id' => Auth::id(),
        'role' => $request->role,
        'type' => 0,
        'confirmed' => true
      ]);



      if($post){

        return redirect()->route('posts.index');

      }

    }
    //
    public function create($type){

      //dd( array_key_exists($type, ArrayHolder::post_types() )  );

      if(array_key_exists($type, ArrayHolder::post_types() )){

        if($type == 0){
          return redirect()->route('posts.create-text');
        }elseif($type == 1){
          return redirect()->route('posts.create-image');
        }elseif($type == 2){
          return redirect()->route('posts.create-video');
        }elseif($type == 3){
          return redirect()->route('posts.create-link');
        }

      }else{
        return 'not exist';
      }

      //return view('back.posts.create', compact('post'));
      return view('back.posts.create');
    }

    public function types(){

        return view('back.posts.types');
    }

    public function index(){

      $posts = Post::whereConfirmed(true)
        ->where('role' , '<=' , Auth::user()->role )->get();

      return view('back.posts.index', compact('posts'));

    }
}
