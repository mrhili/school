<?php

namespace App\Http\Controllers;

use App\Userspayment;
use Illuminate\Http\Request;
use App\{
    User,
    Year,
    History
};
use Application;
use Auth;
use Math;
class UserspaymentController extends Controller
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
     * @param  \App\Teatcherspayment  $teatcherspayment
     * @return \Illuminate\Http\Response
     */
    public function show(Teatcherspayment $teatcherspayment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teatcherspayment  $teatcherspayment
     * @return \Illuminate\Http\Response
     */
    public function edit(Teatcherspayment $teatcherspayment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teatcherspayment  $teatcherspayment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teatcherspayment $teatcherspayment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teatcherspayment  $teatcherspayment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teatcherspayment $teatcherspayment)
    {
        //
    }

    public function addPayment(Request $request, $id, $payment, $month, $year)
    {
        //

        $month_id = $month;

        $user = User::find( $id );

        $month = $user->userpayments()->where('month_id', $month )->where('year_id', $year )->first();


        $admin = User::find( Auth::id() );

        $creation = [

            'id_link' => $id,
            'comment' => $request->comment, 
            //lhomme a payeé un montant 500 dh de pour letudiant qui est dans la class 6  sur le payement du mois 6 sur lanée 2017/2018 et ila remplie le charge parsquil avait rien sur ce mois et il falait quil pay 700dh 
            'info' => 'just talk',
            'hidden_note' => $request->hidden_note,
            'by-admin' => $admin->id,

            'category_history_id' => $user->role + 3,

            //'id_link' => $request->id_link,

            ];


        $old_payment = $month->payment;

        $totalShouldBePayed = $month->should_be_payed + $month->cnss_payment;

        $whatPayed = $month->payment + $payment;

        //$whatPayed  - $totalShouldPay

        $moneyArray = Math::countMoney( $whatPayed , $totalShouldBePayed );

        $month->payment = $whatPayed;

        $month->payment_complete = $moneyArray['payment'];

        $month->save();


        $complet;


        if( $moneyArray['payment']) {
            $complet = 'complet lecole ne doit rien pour lui ( '. $moneyArray['money'] .' dh )';
            $creation['class'] = 'success';
        }else{

            

            $complet = 'nest as complet lecole devrait payé <strong>'.$moneyArray['money']. ' dh </strong>';

            $creation['class'] = 'info';
        }

        $month = 'pour le mois <strong>'. $month_id. '</strong>';



//Le payement de 105dh a etait effectué par okokokok qui porte le numero de la carte okokokok sur letudiant Venus Mccoy Moody pour le mois {"id":2,"user_id":8,"year_id":1,"the_class_id":6,"month_id":2,"should_pay":95,"transport_pay":0,"add_classes_pay":0,"payment":105,"payment_complete":false,"created_at":"2018-04-30 14:38:45","updated_at":"2018-04-30 14:41:17"} pour lannée2018/2019maintenent le payment est incomplet il devrait payé -115 dh
        $creation['info'] = 'Le payement de <strong>'. $payment .' dh </strong> a etait effectué par '.$admin->name .' '. $admin->last_name .' sur letudiant <strong>'.$user->name.' '. $user->last_name. '</strong> '. $month .' pour lannée <strong>'.Year::find($year)->name . '</strong>, maintenent le payment est '. $complet.' lecole avait payé avant un montant de <strong>'.$old_payment.' dh</strong> .'  ;

        $creation['payment'] = $payment;

        History::create( $creation );

        return response()->json($moneyArray);

        //return response()->json([ 'parameter' => $request->parameter ]);
    } 
}