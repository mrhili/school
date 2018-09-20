<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\{
  TheClass,
  History,
  User,
  Biling,
  Bil
};

use Yajra\Datatables\Datatables;

use Auth;

use Application;

class BilingController extends Controller
{
    //
    public function switchPayed(Biling $biling){

        $biling->payed = !$biling->payed;
        $biling->save();

        $buttonArray = Application::fillPayedButton($biling );

      return response()->json($buttonArray);

    }


    public function switchToke(Biling $biling){

        $biling->toke = !$biling->toke;
        $biling->save();

        $buttonArray = Application::fillTokeButton($biling );

        return response()->json($buttonArray);

    }


    public function user(User $user){

      return view('back.bilings.user', compact('user'));

    }
    public function userData(User $user){

    return Datatables::of(Biling::where('user_id', $user->id)->where('year_id', $this->selected_year)->get() )

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

        return link_to('#', $icon, ['class' => 'btn btn-'. $class .' btn-circle btn-payed', 'data-id' => $model->id, 'id' => 'payed-'.$model->id ], null);

    })

    ->rawColumns(['bilings','payed','toke'])


    ->make(true);



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

      $histArr = [

          'id_link' => $bil->id,
          'comment' => $request->comment,
          'hidden_note' => $request->hidden_note,
          'by-admin' => Auth::id(),

          'category_history_id' => 38,
          'class' => 'info'
      ];

      $histArr['info'] = 'le billage a etait generer a la class '. $class->name .'avec le nom de service:  <strong>'.
        $bil->service.'</strong> et le prix <strong>'.$bil->price .'</strong> au éléves: {'.
        implode(" , ", $namesOfStudents ) .'} .';

      History::create( $histArr );


      return response()->json([ 'id' => $bil ]);

    }


}
