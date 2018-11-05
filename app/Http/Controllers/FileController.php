<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\{
  File,
  Test,
  Note,
  Post
};
use Image;
use ArrayHolder;
use CommonPics;
use Auth;

class FileController extends Controller
{
    //
    private $files_path;

    public function __construct()
    {
        $this->files_path = public_path('/images');
    }

    public function storePostImages(Request $request, Post $post ){

        CommonPics::storeAdvImages($request, 2 , $post );

    }


    public function dropPostImage(Request $request, Post $post )
    {

      CommonPics::dropAdvImage($request, 2 , $post);

    }

    public function storeNoteImages(Request $request, Note $note ){

        CommonPics::storeAdvImages($request, 1 , $note );

    }



    public function dropNoteImage(Request $request, Note $note )
    {

      CommonPics::dropAdvImage($request, 1 , $note);

    }



    public function storeTestImages(Request $request, Test $test , $qa ){



      if($qa == 'questions' || $qa == 'answers' ){

        CommonPics::storeAdvImages($request, 0 , $test, $qa);

      }else{
        return response()->json(['message' => 'qa error'], 404);
      }


    }



    public function dropTestImage(Request $request, Test $test, $qa)
    {

      CommonPics::dropAdvImage($request, 0 , $test, $qa);

    }




}
