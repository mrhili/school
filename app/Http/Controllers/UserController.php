<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

use CommonPics;

use App\{
    User,
    Year,
    History,
    Categoryship,
    Relashionship
};

use ArrayHolder;

use Yajra\Datatables\Datatables;

use Auth;

use Alert;

use Session;

use Timing;

use Math;

use Application;

use Relation;


class UserController extends Controller
{





/******************/


    //
    public function bigList(){
      return view('back.users.gradation-list');
    }

    public function dataBigList(){

      return Datatables::of( User::where('role', '>' , 1)->get() )

        ->editColumn('name', function( $model ){

          return $model->name.' '.$model->last_name;
     })

     ->editColumn('role', function( $model ){

          return ArrayHolder::roles( $model->role );
    })

    ->editColumn('grad', function( $model ){

          return link_to_route('users.gradation', 'Graduation', [ $model->id ], ['class' => 'btn btn-info btn-circle', 'target' => '_blank']);

     })

     ->make(true);
    }

    public function gradation(User $user){
      return view('back.users.gradation',compact('user'));
    }

    public function gradationPost(Request $request, User $user){

      $old_role = $user->role;

      $array = array_except( $request->all(), ['_token', 'should_be_payed', 'cnss', 'cnss_payment']);

      if( $request->cnss ){

          $array["cnss"] = true;


      }else{
          $array["cnss"] = false;
      }




       if( $user->update($array) ){


                     $cnss_payment = ( $request->cnss ? $request->cnss_payment : 0 );

                     Relation::fillUsersPayment($user->id, Session::get('yearId'), $request->should_be_payed, $cnss_payment );

                     $user->fill_payment = true;

                     $user->save();

                     //$this->addStudentHistory();


                     $creation = [

                         'id_link' => $user->id,
                         'comment' => $request->comment,
                         'hidden_note' => $request->hidden_note,
                         'by_admin' => Auth::id(),

                         'category_history_id' => 35,
                         'class' => 'success'
                     ];

                     $cnssSentence;
                     if( $request->cnss ){
                         $cnssSentence = 'avec la cnss sous lid <strong>'. $request->cnss_id .'</strong> avec de paiment montielle cnss <strong>'. $request->cnss_payment .'</strong>';
                     }else{
                         $cnssSentence = 'sans cnss';
                     }



                     $creation['info'] ="Un cadre a etait graduer depuis". ArrayHolder::roles( $old_role ) ." à  ".
                      ArrayHolder::roles( $request->role ) .
                     "</strong>qui porte le mnom <strong>".$user->name." ".$user->last_name.
                     "</strong> ".$cnssSentence." et il doit a lecole chaque mois <strong>". $request->should_be_payed ."</strong>";


                     History::create($creation);


                     return redirect()->route('printables.new-worker', $user->id );


       }




    }



    public function userlist(){
      return view('back.users.userlist');
    }

    public function userlistdata(){
      return Datatables::of(User::where('role', 0 )->get(['id', 'name', 'email']) )

      ->editColumn('name', function( $model ){



         return link_to_route('users.profile', $model->name, [ $model->id ], ['class' => 'btn btn-info btn-circle', 'target' => '_blank']);

   })
     ->make(true);
    }



    public function home(){

      return view('back.users.home');
    }

    public function changeInfo(Request $request, User $user){
      $infoUser = array_except( $request->all(),['family_situation']);
        if( $request->family_situation ){

            $infoUser["family_situation"] = true;

        }else{
            $infoUser["family_situation"] = false;
        }
      $user->fill( $infoUser )->save();

      alert()->success('Success','Les informations son changer avec succes');

      return redirect()->back()->withInput();
    }

    public function myProfile(){
        $year = Session::get('yearId');


        /****************/

        $passInfo = true;
        $passChangeInfo = true;
        /*****************/

        $user = Auth::user();

        return view('back.users.profile',compact('passInfo', 'user', 'passChangeInfo'));
    }
    public function profile(User $user){

      $year = Session::get('yearId');

      /****************/
      $passInfo = false;
      $passChangeInfo= false;
      if( Auth::check() ){

        if( Auth::user()->role > 4 ){

          $passInfo = true;
          $passChangeInfo = true;

        }

      }


      /*****************/

      return view('back.users.profile', compact('passInfo', 'user', 'passChangeInfo'));
    }


    public function add($role = null){

    	return view('back.users.add-all',compact('role'));
    }




    public function store(UserRequest $request){


    	$array = array_except( $request->all(), ['_token', 'password' ,'img','cv', 'family_situation',
      'should_be_payed', 'cnss', 'cnss_payment', 'comment', 'hidden_note']);


    	if( $request->hasFile( 'img' ) ){

    		$imgName = CommonPics::storeFile( $request->img , ArrayHolder::roles_routing( $request->role ) );

    		$array["img"] = $imgName;

    	}

    	if( $request->hasFile( 'cv' ) ){

    		$cvName = CommonPics::storeFile( $request->cv , 'cvs' );

    		$array["cv"] = $cvName;

    	}

        if( $request->cnss ){

            $array["cnss"] = true;


        }else{
            $array["cnss"] = false;
        }

    	$array["password"] = bcrypt($request->password );

    	$maried;
        if( $request->family_situation ){

            $array["family_situation"] = true;
            $maried = 'marié';

        }else{
            $array["family_situation"] = false;
            $maried = 'célibataire';
        }

        /*******************/


    	$user = User::create($array);


	    if ($user) {

            $cnss_payment = ( $request->cnss ? $request->cnss_payment : 0 );

            Relation::fillUsersPayment($user->id, Session::get('yearId'), $request->should_be_payed, $cnss_payment );

            //Relation::fillStudentsPayment($student->id, $request->year_id , $request->class, $request->should_pay, $transport_pay, $add_class_pay, $request->saving_pay ,$request->assurence_pay );


            $user->fill_payment = true;

            $user->save();

            //$this->addStudentHistory();


            $creation = [

                'id_link' => $user->id,
                'comment' => $request->comment,
                'hidden_note' => $request->hidden_note,
                'by_admin' => Auth::id(),

                'category_history_id' => $request->role+1,
                'class' => 'success'

                //'id_link' => $request->id_link,

            ];

            $cnssSentence;
            if( $request->cnss ){
                $cnssSentence = 'avec la cnss sous lid <strong>'. $request->cnss_id .'</strong> avec de paiment montielle cnss <strong>'. $request->cnss_payment .'</strong>';
            }else{
                $cnssSentence = 'sans cnss';
            }



            $creation['info'] = "Un nouveau <strong> ". ArrayHolder::roles( $request->role ) .
            "</strong>qui porte le mnom <strong>".$user->name." ".$user->last_name.
            "</strong> a etait crée avec succes  est ses information personelle sont  => genre = <strong>". ArrayHolder::gender($user->gender).
            "</strong>, Numero de la carte = <strong>".$user->cin."</strong>, habite à <strong>".$user->city.
            "</strong>, code postal = <strong>".$user->zip_code."</strong>, son adress est <strong>".$user->adress.
            "</strong>, son telephone 1  = <strong>".$user->phone."</strong>, telephone 2  = <strong>".$user->phone2.
            "</strong>, telephone 3  = <strong>".$user->phone3."</strong>, telephone fix = <strong>".$user->fix.
            "</strong>, sa profession est <strong>".$user->profession."</strong>, sa cituation familiale est <strong>".$maried.
            "</strong> ".$cnssSentence." et il doit a lecole chaque mois <strong>". $request->should_be_payed ."</strong>";


            History::create($creation);

            /*Parent variable creation*/

            //Alert::success('Success Title', 'Success Message');

            return redirect()->route('printables.new-worker', $user->id );

            }



    }


    public function byRole($role){


    	return view('back.users.by-role', compact('role'));

    }





    public function dataByRole( $role ){

        $year = Session::get('yearId');





        return Datatables::of(User::where('role', $role )->get() )

        ->editColumn('nomcomplet', function( $model ){



         return $model->name . ' '. $model->last_name;

     })

        ->editColumn('septembre', function( $model ) use($year){

            $moneyArray = Application::fillMonthButtonUser($model, 9 ,$year );



            $label = $moneyArray['money'];
            $class = $moneyArray['class'];



            return link_to('#', $label, ['class' => 'btn btn-'. $class .' btn-circle btn-pay', 'data-toggle'=>'modal', 'data-target'=>'#modal-default', 'data-id' => $model->id, 'data-month' => 9, 'id' => $model->id.'-9' ], null);
        })

        ->editColumn('octobre', function( $model ) use($year){

            $moneyArray = Application::fillMonthButtonUser($model, 10,$year );



            $label = $moneyArray['money'];
            $class = $moneyArray['class'];

            return link_to('#', $label, ['class' => 'btn btn-'. $class .' btn-circle btn-pay', 'data-toggle'=>'modal', 'data-target'=>'#modal-default', 'data-id' => $model->id, 'data-month' => 10, 'id' => $model->id.'-10' ], null);
            })
        ->editColumn('novembre', function( $model ) use($year){

            $moneyArray = Application::fillMonthButtonUser($model, 11,$year );



            $label = $moneyArray['money'];
            $class = $moneyArray['class'];

            return link_to('#', $label, ['class' => 'btn btn-'. $class .' btn-circle btn-pay', 'data-toggle'=>'modal', 'data-target'=>'#modal-default', 'data-id' => $model->id , 'data-month' => 11 , 'id' => $model->id.'-11' ], null);
            })
        ->editColumn('decembre', function( $model ) use($year){

            $moneyArray = Application::fillMonthButtonUser($model, 12,$year );



            $label = $moneyArray['money'];
            $class = $moneyArray['class'];

            return link_to('#', $label, ['class' => 'btn btn-'. $class .' btn-circle btn-pay', 'data-toggle'=>'modal', 'data-target'=>'#modal-default', 'data-id' => $model->id , 'data-month' => 12, 'id' => $model->id.'-12' ], null);
            })
        ->editColumn('janvier', function( $model ) use($year){

            $moneyArray = Application::fillMonthButtonUser($model, 1,$year );



            $label = $moneyArray['money'];
            $class = $moneyArray['class'];

            return link_to('#', $label, ['class' => 'btn btn-'. $class .' btn-circle btn-pay', 'data-toggle'=>'modal', 'data-target'=>'#modal-default', 'data-id' => $model->id ,'data-month' => 1, 'id' => $model->id.'-1' ], null);
            })
        ->editColumn('fevrier', function( $model ) use($year){

            $moneyArray = Application::fillMonthButtonUser($model, 2,$year );



            $label = $moneyArray['money'];
            $class = $moneyArray['class'];

            return link_to('#', $label, ['class' => 'btn btn-'. $class .' btn-circle btn-pay', 'data-toggle'=>'modal', 'data-target'=>'#modal-default', 'data-id' => $model->id ,'data-month' => 2, 'id' => $model->id.'-2' ], null);
            })
        ->editColumn('mars', function( $model ) use($year){

            $moneyArray = Application::fillMonthButtonUser($model, 3,$year );

            $label = $moneyArray['money'];
            $class = $moneyArray['class'];

            return link_to('#', $label, ['class' => 'btn btn-'. $class .' btn-circle btn-pay', 'data-toggle'=>'modal', 'data-target'=>'#modal-default', 'data-id' => $model->id ,'data-month' => 3, 'id' => $model->id.'-3' ], null);
            })
        ->editColumn('avril', function( $model ) use($year){
            $moneyArray = Application::fillMonthButtonUser($model, 4,$year );



            $label = $moneyArray['money'];
            $class = $moneyArray['class'];

            return link_to('#', $label, ['class' => 'btn btn-'. $class .' btn-circle btn-pay', 'data-toggle'=>'modal', 'data-target'=>'#modal-default', 'data-id' => $model->id ,'data-month' => 4, 'id' => $model->id.'-4' ], null);
            })
        ->editColumn('mai', function( $model ) use($year){

            $moneyArray = Application::fillMonthButtonUser($model, 5,$year );



            $label = $moneyArray['money'];
            $class = $moneyArray['class'];

            return link_to('#', $label, ['class' => 'btn btn-'. $class .' btn-circle btn-pay', 'data-toggle'=>'modal', 'data-target'=>'#modal-default', 'data-id' => $model->id ,'data-month' => 5, 'id' => $model->id.'-5' ], null);
            })
        ->editColumn('juin', function( $model ) use($year){

            $moneyArray = Application::fillMonthButtonUser($model, 6,$year );



            $label = $moneyArray['money'];
            $class = $moneyArray['class'];

            return link_to('#', $label, ['class' => 'btn btn-'. $class .' btn-circle btn-pay', 'data-toggle'=>'modal', 'data-target'=>'#modal-default', 'data-id' => $model->id ,'data-month' => 6, 'id' => $model->id.'-6' ], null);
            })


        ->editColumn('action', function($model){
            return link_to('#', 'action', ['class' => 'btn btn-success btn-circle btn-click', 'data-toggle'=>'modal', 'data-target'=>'#modal-default', 'data-id' => $model->id ], null);
        })

        ->editColumn('del', function($model){
            return link_to_route('home', 'delete', [ $model->id ], ['class' => 'btn btn-danger btn-circle']);
        })

        ->make(true);

    }





}
