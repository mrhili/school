<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\{
  File,
  Test
};
use Image;
use ArrayHolder;
use CommonPics;

class FileController extends Controller
{
    //
    private $files_path;

    public function __construct()
    {
        $this->files_path = public_path('/images');
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
