<?php

namespace App\Helpers\Common;
use File;

use App\Helpers\Config\Setting;

use App\{
    Year,
    Month,
    User,
    StudentsPayment,
    Userspayment,
    History,
    HistoryCategory,
    Fournituration,
    Fourniture,
    TheClass,
    Meetingtype,
    Meeting,
    Meetingpopulating,
    PivotCoursub,
    Subjectclass,
    Teatchification,
    Demandefourniture,
    File as Filetable

};

use Session;
use Carbon;
use Auth;
use Image;
use Relation;
use ArrayHolder;
class Pics {

      public static function getAdvImage( $model_type, $img_id , $add_info = null ){

        $img = Filetable::find( $img_id );

        if( $img ){


          $path = public_path().'/images/'. ArrayHolder::modelTypes4file($model_type)['folder'] .'/' ;
          $asset_path = '/images/'. ArrayHolder::modelTypes4file($model_type)['folder'] .'/' ;

          if($model_type == 0){

            if($add_info == 'questions'){

              $path.= 'questions/';
              $asset_path.= 'questions/';

            }elseif( $add_info == 'answers' ){

              $path.= 'answers/';
              $asset_path.= 'answers/';

            }




          }


          if( file_exists( $path.$img->name.'.'.$img->ext ) ){

            return asset( $asset_path.$img->name.'.'.$img->ext );

          }else{

            return asset('/images/config/'. Setting::getConfig( 'no-image' ) );
          }



        }



      }


      public static function dropAdvImage( $request , $model_type, $model , $add_info = null ){

          $fill;

          $path = public_path().'/images/'. ArrayHolder::modelTypes4file($model_type)['folder'] .'/' ;

          if($model_type == 0){

            if($add_info == 'questions'){

              $path.= 'questions/';

            }elseif( $add_info == 'answers' ){

              $path.= 'answers/';

            }
          }

          if(!empty($request->filename)){

            $file = Filetable::where('old_name', $request->filename)
              ->where( 'model_type', $model_type )
              ->where( 'file_type', 0 )
              ->where( 'model_id', $model->id )
              ->first();

            if( $file && file_exists($path . $file->name.'.'.$file->ext) ){

              unlink( $path . $file->name.'.'.$file->ext );


              if($model_type == 0){

                if($add_info == 'questions'){


                  $fill = json_decode( $model->body , true);


                }elseif($add_info == 'answers'){

                  $fill = json_decode( $model->answers , true);

                }

                Application::dropSort($fill , $file->id );


                if($add_info == 'questions'){


                  $model->body = json_encode( $fill );


                }elseif( $add_info == 'answers' ){


                  $model->answers = json_encode( $fill );

                }

                $model->save();

                return response()->json(['message' => 'File successfully delete'], 200);


              }elseif($model_type == 1){

                $fill = json_decode( $model->answers , true)? [] :  json_decode( $model->answers , true) ;

                Application::dropSort($fill , $file->id );


              }elseif( $model_type == 2 ){
                $fill = json_decode( $model->images , true)? [] :  json_decode( $model->images , true) ;

                Application::dropSort($fill , $file->id );

              }




            }else{

              return response()->json(['message' => 'Sorry file does not exist'], 400);

            }


          }



      }





    public static function storeAdvImages( $request , $model_type, $model , $add_info = null ){


      $fill = [];

         $path = public_path().'/images/'. ArrayHolder::modelTypes4file($model_type)['folder'] .'/' ;

        if($model_type == 0){

          if($add_info == 'questions'){

            $path.= 'questions/';

            $fill = json_decode( $model->body , true);

          }elseif( $add_info == 'answers' ){

            $path.= 'answers/';

            $fill = json_decode( $model->answers , true);

          }
        }elseif( $model_type == 1 ){

          $fill = is_array ( json_decode( $model->answers , true) )? json_decode( $model->answers , true) : []   ;

        }elseif( $model_type == 2 ){

          $fill = is_array ( json_decode( $model->images , true) )? json_decode( $model->images , true) : []   ;

        }



        $files = $request->file('file');

        if (!is_array($files)) {
              $files = [$files];
        }

        for ($i = 0; $i < count($files); $i++) {

            $file = $files[$i];

            $name = ArrayHolder::modelTypes4file( $model_type )['model'] . sha1( date('YmdHis') ) . str_random(15);

            $save_name = $name . '.' . $file->getClientOriginalExtension();
            $img = Image::make($file);

            if($model_type == 0 || $model_type == 1 ){
              $img->resize(2481, 3507);
            }else{
              $img->resize(800, null, function ($constraint) {
                  $constraint->aspectRatio();
              });
            }

            $img->save( $path . $save_name);



            if( $img ){

              $file_item = Filetable::create([
                'old_name' => $file->getClientOriginalName(),
                'name' => $name,
                'ext' => $file->getClientOriginalExtension(),
                'file_type' => 0,
                'model_type' => $model_type,
                'model_id' => $model->id
              ]);

              if($file_item){

                if(count( $fill ) > 0){

                  ksort($fill);
                  end($fill);
                  $fill[ key($fill)+1 ] = $file_item->id;

                }else{
                  $fill[1] = $file_item->id;
                }




                /////////////////
                if($model_type == 0){
                  if($add_info == 'questions'){

                    $model->body = json_encode( $fill );

                  }elseif( $add_info == 'answers' ){

                    $model->answers = json_encode( $fill );

                  }


                }elseif( $model_type == 1 ){

                  $model->answers = json_encode( $fill );

                }elseif( $model_type == 2 ){

                  $model->images = json_encode( $fill );

                }

                $model->save();


                return response()->json([
                    'message' => 'Image saved Successfully'
                ], 200);
              }else{
                return response()->json([
                    'message' => 'Image did not saved in the db'
                ], 500);
              }

            }else{

              return response()->json([
                  'message' => 'Image did not saved in the file sytem'
              ], 500);

            }


        }




////////////////////

    }

    public static function storeFile( $file = '', $dir = '' ){

        $imgName = $file->getClientOriginalName();

        $imgAndTime = time() . '_' . $imgName ;

        $file->move( base_path().'/public/images/'. $dir .'/', $imgAndTime );

        return $imgAndTime;

    }

    public static function storeCompareFile($slug = '', $dir = '', $file = '' ,$request){

    	$imgName = $request->file( $slug )->getClientOriginalName();


	        if( file_exists( base_path().'/public/images/'. $dir .'/'.$file ) ){

	            File::delete( base_path().'/public/images/'. $dir .'/' . $file );

	        }

        $imgAndTime = time() . '_' . $imgName ;

        $request->file( $slug )->move( base_path().'/public/images/'. $dir .'/', $imgAndTime );

	    return $imgAndTime;

    }

    public static function ifImg($place, $varImg ){

        if( $varImg == '' || $varImg == null || !file_exists( base_path().'/public/images/'. $place .'/'.$varImg )  ){

            return asset('/images/config/'. Setting::getConfig( 'no-image' ) );

        }else{

            return asset('/images/'.$place.'/'. $varImg );

        }

    }

}
