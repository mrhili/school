<?php

namespace App\Http\Controllers;

use App\StudentsPayment;
use Illuminate\Http\Request;
use App\{
    User,
    Year,
    History
};
use Application;
use Auth;
use Math;
use Session;

use Yajra\Datatables\Datatables;


class StudentsPaymentController extends Controller
{

  public function childPayments(User $student){


    return view('back.studentspayments.child-payments', compact('student'));

  }


  public function dataChildPayments(User $student){

    $year = Session::get('yearId');



    return Datatables::of(

        StudentsPayment::where('user_id', $student->id )->where('the_class_id', $student->the_class_id )->where('year_id', $year )->get()

       )

       ->editColumn('month', function( $model ){



            return $model->month->name;

        })

        ->editColumn('statut', function( $model )use($year){

          $moneyArray = Application::fillMonthButtonForChild($model);



          $label = $moneyArray['money'];
          $class = $moneyArray['class'];



          return link_to('#', $label, ['class' => 'btn btn-'. $class .' btn-circle' ], null);

         })

         ->rawColumns(['statut'])

         ->make(true);
  }


    public function addPayment(Request $request, $id, $payment, $month, $year, $class)
    {
        //

        $month_id = $month;

        $student = User::find( $id );

        $month = $student->payments()->where('month_id', $month )->where('year_id', $year )->where('the_class_id', $class )->first();

        $creation = [

            'id_link' => $id,
            'comment' => $request->comment,
            //lhomme a payeé un montant 500 dh de pour letudiant qui est dans la class 6  sur le payement du mois 6 sur lanée 2017/2018 et ila remplie le charge parsquil avait rien sur ce mois et il falait quil pay 700dh
            'info' => 'just talk',
            'hidden_note' => $request->hidden_note,
            'by-admin' => Auth::id(),

            'category_history_id' => 1,

            //'id_link' => $request->id_link,

            ];
        $hoo;

        if( $request->hoo == 'user'){
            $creation['by-user'] = $request->by_user;
            $modelHoo = User::find( $request->by_user );
            $hoo = $modelHoo->name . ' ' . $modelHoo->last_name ;


        }elseif( $request->hoo == 'exterior' ){
            $creation['by-exterior-name'] = $request->by_exterior_name;
            $creation['by-exterior-info'] = $request->by_exterior_info;

            $hoo = '<strong>'. $request->by_exterior_name . '</strong> qui porte le numero de la carte <strong>' . $request->by_exterior_info.'</strong>' ;

        }

        $old_payment = $month->payment;

        $totalShouldPay = $month->should_pay + $month->add_classes_pay + $month->transport_pay;

        $whatPayed = $month->payment + $payment;

        //$whatPayed  - $totalShouldPay

        $moneyArray = Math::countMoney( $whatPayed , $totalShouldPay );

        $month->payment = $whatPayed;

        $month->payment_complete = $moneyArray['payment'];

        $month->save();


        $complet;


        if( $moneyArray['payment']) {
            $complet = 'complet il doit rien ( '. $moneyArray['money'] .' dh )';
            $creation['class'] = 'success';
        }else{



            $complet = 'incomplet il devrait payé <strong>'.$moneyArray['money']. ' dh </strong>';

            $creation['class'] = 'info';
        }

        $month;

        if( $month_id == 13) {

            $month = 'pour  <strong> les frais denregisrement</strong>';

        }elseif( $month_id == 14){

            $month = 'pour <strong> les frais dassurance </strong>';

        }elseif( $month_id == 15){

            $month = 'pour <strong> les frais dassurance de transport </strong>';

        }else{

            $month = 'pour le mois <strong>'. $month_id. '</strong>';

        }


//Le payement de 105dh a etait effectué par okokokok qui porte le numero de la carte okokokok sur letudiant Venus Mccoy Moody pour le mois {"id":2,"user_id":8,"year_id":1,"the_class_id":6,"month_id":2,"should_pay":95,"transport_pay":0,"add_classes_pay":0,"payment":105,"payment_complete":false,"created_at":"2018-04-30 14:38:45","updated_at":"2018-04-30 14:41:17"} pour lannée2018/2019maintenent le payment est incomplet il devrait payé -115 dh
        $creation['info'] = 'Le payement de <strong>'. $payment .' dh </strong> a etait effectué par '.$hoo.' sur letudiant <strong>'.$student->name.' '. $student->last_name. '</strong> '. $month .' pour lannée <strong>'.Year::find($year)->name . '</strong>, maintenent le payment est '. $complet.' et il avait payé avant un montant de <strong>'.$old_payment.' dh</strong> .'  ;

        $creation['payment'] = $payment;

        History::create( $creation );

        return response()->json($moneyArray);

        //return response()->json([ 'parameter' => $request->parameter ]);
    }
}
