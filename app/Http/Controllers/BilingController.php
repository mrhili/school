<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\{
  TheClass,
  History,
  User,
  Biling,
  Bil,
  Transparancy,
  Wallet
};

use Yajra\Datatables\Datatables;

use Auth;

use Application;

class BilingController extends Controller
{
    //
    public function refuse(Biling $biling){

      if( Auth::user()->role >= 2 && !$biling->toke ){

        $info = "le bil a etait pour <strong>".$biling->client->name." ".$biling->client->last_name
         ."</strong> qui est dans la class <strong>". $biling->client->the_class->name ."</strong>";

        $ifTrue = Biling::find( $biling->id )->delete();

        if($ifTrue){

          Application::toHistory(
              $biling->bil,
              [
                39,
                'warning',
                $info
              ]
          );

        }

        response()->json(['message' => true ], 503);

      }else{
        response()->json(['message' => 'Error'], 503);
      }


    }


    public function switchPayed(Biling $biling){

      if( Auth::user()->role >= 4 ){

        $biling->payed = !$biling->payed;
        $biling->token_id = Auth::id();
        $ifTrue = $biling->save();

        if( $ifTrue ){

          $info = 'le <strong>'.$biling->bil->service.'</strong> de <strong>'.
            $biling->client->name.' '.$biling->client->last_name.
            '</strong> a etait payé et le prix est  <strong>'.$biling->bil->price .
            '</strong>.';


          $history = Application::toHistory(
                        $biling,
                        [
                          40,
                          'info',
                          $info
                        ]
                    );



          if( $history ){

            Application::toWallet( $history, $biling->bil->price );


            $buttonArray = Application::fillPayedButton($biling );

            return response()->json($buttonArray);
          }

        }


      }else{

        $buttonArray = Application::fillPayedButton($biling );

        return response()->json($buttonArray);

      }

    }


    public function switchToke(Biling $biling){

        $biling->toke = !$biling->toke;
        $ifTrue = $biling->save();

        $info = 'le '. $biling->bil->service .' a etait '. ( $biling->toke? 'prise':'non prise');

        if( $ifTrue ){
          Application::toHistory(
                        $biling,
                        [
                          45,
                          'info',
                          $info
                        ]
                    );
        }

        $buttonArray = Application::fillTokeButton($biling );

        return response()->json($buttonArray);

    }


    public function user(User $user){

      return view('back.bilings.user', compact('user'));

    }
    public function userData(User $user){

      $snif = Datatables::of(Biling::where('user_id', $user->id)->where('year_id', $this->selected_year)->get() )
      ->addColumn('service', function(Biling $model) {
          return $model->bil->service ;
      })

    ->addColumn('price', function(Biling $model) {
        return $model->bil->price ;
    })

    ->addColumn('toke', function(Biling $model) {


        $buttonArray = Application::fillTokeButton($model );

        $icon = $buttonArray['icon'];
        $class = $buttonArray['class'];

        return link_to('#', $icon, ['class' => 'btn btn-'. $class .' btn-circle btn-toke', 'data-id' => $model->id, 'id' => 'exist-'.$model->id ], null);
    })

    ->addColumn('payed', function(Biling $model) {

      $buttonArray = Application::fillPayedButton($model );

      $icon = $buttonArray['icon'];
      $class = $buttonArray['class'];

      if( Auth::user()->role >= 4 ){

        return link_to('#', $icon, ['class' => 'btn btn-'. $class .' btn-circle btn-payed', 'data-id' => $model->id, 'id' => 'payed-'.$model->id ], null);


      }else{


        return link_to('#', $icon, ['class' => 'btn btn-'. $class .' btn-circle', 'data-id' => $model->id, 'id' => 'payed-'.$model->id ], null);


      }


    });


    if( Auth::user()->role == 2 ){
      $snif->addColumn('refused', function(Biling $model) {


        if( $model->toke ){

          return 'Tu peut pas refusé parseque le biling est pris';

        }else{


          return link_to('#', 'Refusé', ['class' => 'btn btn-warning btn-circle btn-refuse', 'data-id' => $model->id, 'id' => 'refuse-'.$model->id ], null);

        }

      });
    }


    $snif->rawColumns(['bilings','payed','toke']);


    return $snif->make(true) ;



    }



    public function dataByClass(TheClass $class){

    return Datatables::of(User::where('role', 1)->where('the_class_id', $class->id)->get() )
    ->addColumn('complet_name', function(User $student) {


        return $student->name.' '.$student->last_name ;
    })

    ->addColumn('bilings', function(User $student) {

      return link_to_route( 'bilings.user' ,'Bilings', [ $student->id ], ['class' => 'btn btn-info btn-circle']);

    })

    ->rawColumns(['bilings'])


    ->make(true);



    }

    public function byClass(TheClass $class){

      $bils = Bil::get(['service', 'id'])->pluck('service', 'id')->toArray();

      $students = User::where('the_class_id', $class->id)->where('role', 1)->get();



      return view('back.bilings.by-class',compact('bils', 'class', 'students'));

    }

    public function generateToClass(Request $request, TheClass $class){

      $bil = Bil::find($request->bil);

      $students = User::where('role', 1 )
        ->where('the_class_id', $class->id )
        ->get();

      $namesOfStudents = [];

      foreach ( $students as $student ) {
        //if(! Biling::where( 'user_id', $student->id )->first() ){}
        Biling::create([
          'bil_id' => $bil->id,
          'user_id' => $student->id,
          'year_id' => $this->selected_year,
        ]);

        $namesOfStudents[] = 'id ->'.$student->id.' & name ->'.$student->name.' '.$student->last_name;

      }


      $info = 'le billage a etait generer a la class '. $class->name .'avec le nom de service:  <strong>'.
        $bil->service.'</strong> et le prix <strong>'.$bil->price .'</strong> au éléves: {'.
        implode(" , ", $namesOfStudents ) .'} .';



          Application::toHistory(
                        $bil,
                        [
                          38,
                          'info',
                          $info
                        ],
                        $request
                    );



      return response()->json([ 'id' => $bil ]);

    }


}
