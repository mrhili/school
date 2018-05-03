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


class StudentsPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StudentsPayment  $studentsPayment
     * @return \Illuminate\Http\Response
     */
    public function show(StudentsPayment $studentsPayment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StudentsPayment  $studentsPayment
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentsPayment $studentsPayment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StudentsPayment  $studentsPayment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentsPayment $studentsPayment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StudentsPayment  $studentsPayment
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentsPayment $studentsPayment)
    {
        //
    }

    public function addPayment(Request $request, $id, $payment, $month, $year, $class)
    {
        //

        $month_id = $month;

        $student = User::find( $id );
        
        $month = $student->payments()->where('month_id', $month )->where('year_id', $year )->where('the_class_id', $class )->first();

        $old_payment = $month->payment;

        $whatPayed = $month->payment + $payment;


        $totalShouldPay = $month->should_pay + $month->add_classes_pay + $month->transport_pay;

        $moneyArray = Math::countMoney( $whatPayed , $totalShouldPay );


        $creation = [

            'id_link' => $id,
            'comment' => $request->comment, 
            //lhomme a payeé un montant 500 dh de pour letudiant qui est dans la class 6  sur le payement du mois 6 sur lanée 2017/2018 et ila remplie le charge parsquil avait rien sur ce mois et il falait quil pay 700dh 
            'info' => 'just talk',
            'hidden_note' => $request->hidden_note,
            'by-admin' => Auth::id(),

            'categoy_history_id' => 1,

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

        $month->payment = $moneyArray['money'];

        $month->payment_complete = $moneyArray['paiment'];

        $month->save();


        $complet;
        $devrait;

        $devrait = $totalShouldPay - $whatPayed;

        if( $moneyArray['paiment']) {
            $complet = 'complet';
            $creation['class'] = 'success';
        }else{

            

            $complet = 'incomplet il devrait payé <strong>'.$devrait. ' dh </strong>';

            $creation['class'] = 'info';
        }


//Le payement de 105dh a etait effectué par okokokok qui porte le numero de la carte okokokok sur letudiant Venus Mccoy Moody pour le mois {"id":2,"user_id":8,"year_id":1,"the_class_id":6,"month_id":2,"should_pay":95,"transport_pay":0,"add_classes_pay":0,"payment":105,"payment_complete":false,"created_at":"2018-04-30 14:38:45","updated_at":"2018-04-30 14:41:17"} pour lannée2018/2019maintenent le payment est incomplet il devrait payé -115 dh
        $creation['info'] = 'Le payement de <strong>'. $payment .' dh </strong> a etait effectué par '.$hoo.' sur letudiant <strong>'.$student->name.' '. $student->last_name. '</strong> pour le mois <strong>'. $month_id. '</strong> pour lannée <strong>'.Year::find($year)->name . '</strong>, maintenent le payment est '. $complet.' parsequil doit payé en total <strong>'. $devrait . ' dh </strong> et il avait payé avant un montant de <strong>'.$old_payment.' dh</strong> .'  ;

        History::create( $creation );



        return response()->json($moneyArray);

        //return response()->json([ 'parameter' => $request->parameter ]);
    }
}