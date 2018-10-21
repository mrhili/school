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

use Relation;
use ArrayHolder;
class Pdfs {



  public static function getPdf( $model_type, $pdf_id , $add_info = null ){

    $pdf = Filetable::find( $pdf_id );

    if( $pdf ){


      $path = public_path().'/pdfs/'. ArrayHolder::modelTypes4file($model_type)['folder'] .'/' ;
      $asset_path = '/pdfs/'. ArrayHolder::modelTypes4file($model_type)['folder'] .'/' ;

      if($model_type == 0){

        if($add_info == 'questions'){

          $path.= 'questions/';
          $asset_path.= 'questions/';

        }elseif( $add_info == 'answers' ){

          $path.= 'answers/';
          $asset_path.= 'answers/';

        }

        if( file_exists( $path.$pdf->name.'.'.$pdf->ext ) ){

          return asset( $asset_path.$pdf->name.'.'.$pdf->ext );

        }else{

          //return asset('/images/config/'. Setting::getConfig( 'no-pdf' ) );
          return asset('/pdfs/config/no-pdf.pdf' );
        }


      }



    }



  }







  public static function storePdfs( $request , $model_type, $model , $add_info = null ){


    $fill = [];

       $path = public_path().'/pdfs/'. ArrayHolder::modelTypes4file($model_type)['folder'] .'/' ;

      if($model_type == 0){

        if($add_info == 'questions'){

          $path.= 'questions/';

          $fill = [];

          $file_name = 'body';

        }elseif( $add_info == 'answers' ){

          $path.= 'answers/';

          $fill = [];

          $file_name = 'answers';

        }
      }





      if ($request->hasFile($file_name)) {


              $files = $request->file($file_name);

              if (!is_array($files)) {
                    $files = [$files];
              }


              for ($i = 0; $i < count($files); $i++) {

                  $file = $files[$i];

                  $name = ArrayHolder::modelTypes4file( $model_type )['model'] . sha1( date('YmdHis') ) . str_random(15);

                  $save_name = $name . '.' . $file->getClientOriginalExtension();

                  $file->move( $path , $save_name );


                    $file_item = Filetable::create([
                      'old_name' => $file->getClientOriginalName(),
                      'name' => $name,
                      'ext' => $file->getClientOriginalExtension(),
                      'file_type' => 1,
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

                        $model->save();
                      }
                      /////////////////

                    }else{
                      return response()->json([
                          'message' => 'Pdf did not saved in the db'
                      ], 500);
                    }



              }





      }







////////////////////

  }





}
