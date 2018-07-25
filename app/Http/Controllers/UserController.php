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
    //
    public function add($role = null){

    	return view('back.users.add-all',compact('role'));
    }




    public function store(UserRequest $request){


    	$array = array_except( $request->all(), ['_token', 'password' ,'img','cv', 'family_situation', 'should_be_payed', 'cnss', 'cnss_payment']);


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

            /*            $table->integer('should_pay')->default(350);
            $table->integer('transport_pay')->default(350);
            $table->integer('add_class_pay')->default(350);*/

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
                'by-admin' => Auth::id(),

                'category_history_id' => $request->role+1,
                'class' => 'success'

                //'id_link' => $request->id_link,

            ];

            $transSentence;
            if( $request->transport ){
                $transSentence = '<strong>avec le transport</strong> sous ladress  <strong>'. $request->adress .'</strong>  avec un montant décider de <strong>'. $request->transport_pay .' dh</strong> par mois ';
            }else{
                $transSentence = '<strong>sans transport</strong> est sont adress est '. $request->adress;
            }

            $cnssSentence;
            if( $request->cnss ){
                $cnssSentence = 'avec la cnss sous lid <strong>'. $request->cnss_id .'</strong> avec de paiment montielle cnss <strong>'. $request->cnss_payment .'</strong>';
            }else{
                $cnssSentence = 'sans cnss';
            }



            $creation['info'] = "Un nouveau <strong> ". ArrayHolder::roles( $request->role ) ."</strong>qui porte le mnom <strong>".$user->name." ".$user->last_name."</strong> a etait crée avec succes  est ses information personelle sont  => genre = <strong>". ArrayHolder::gender($user->gender)."</strong>, Numero de la carte = <strong>".$user->cin."</strong>, habite à <strong>".$user->city."</strong>, code postal = <strong>".$user->zip_code."</strong>, son adress est <strong>".$user->adress."</strong>, son telephone 1  = <strong>".$user->phone."</strong>, telephone 2  = <strong>".$user->phone2."</strong>, telephone 3  = <strong>".$user->phone3."</strong>, telephone fix = <strong>".$user->fix."</strong>, sa profession est <strong>".$user->profession."</strong>, sa cituation familiale est <strong>".$maried."</strong> ".$cnssSentence." et il doit a lecole chaque mois <strong>". $request->should_be_payed ."</strong>";


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
