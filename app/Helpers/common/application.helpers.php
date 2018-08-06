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
    Calendar as Calendinar,
    Calendarteatchification

};

use MaddHatter\LaravelFullcalendar\Facades\Calendar;

use Session;
use Carbon;
use Auth;

use Relation;

use Illuminate\Http\Request;


class Application{

  public static function method($method = null, $execution){
    if ($method !== null) {

      if ($method !== 'ajax') {
          return;
      }

    }
    /*Execution**/
    if( $execution == 'backinputs' ){

      if ($method !== null) {

        if ($method == 'ajax') {
          return response()->json(['error' => 'erro inputs'], 403);
        }else{
          return back()->withInput();
        }

      }

    }

  }

    public static function storeCalendar( Request $request , $role, $method = null){



      if(!( Carbon::parse( $request->start_date ) < Carbon::parse( $request->end_date ) ) ){


        self::method($method, 'backinputs');

      }

      $array = [
        'title' => $request->title,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
        'background_color' => $request->background_color,
        'role' => $role
      ];

      if( $request->is_all_day ){
        $array['is_all_day'] = true;
      }else{
        $array['is_all_day'] = false;
      }

      if( $request->holiday ){
        $array['holiday'] = true;
      }else{
        $array['holiday'] = false;
      }


      if( $request->repeated ){

        if(! $request->validate([
            'repeated_type' => 'required',
            'end_repeated_type' => 'required',
          ])
        ){
            self::method($method, 'backinputs');
        }
        $array['repeated'] = true;
        $array['repeated_type'] = $request->repeated_type;
        $array['end_repeated_type'] = $request->end_repeated_type;
      }else{
        $array['repeated'] = false;
        $array['repeated_type'] = null;
        $array['end_repeated_date'] = null;
      }


      $calendar = Calendinar::create($array);

      if( $calendar ){





        $admin = Auth::user();

        $creation = [

            'id_link' => $calendarteatchification->id,
            'comment' => $request->comment,
            //lhomme a payeé un montant 500 dh de pour letudiant qui est dans la class 6  sur le payement du mois 6 sur lanée 2017/2018 et ila remplie le charge parsquil avait rien sur ce mois et il falait quil pay 700dh
            'info' => 'just talk',
            'hidden_note' => $request->hidden_note,
            'by-admin' => $admin->id,
            'category_history_id' => 32,
            'class' => 'success',
            //'id_link' => $request->id_link,

            ];

        $creation['info'] = 'Ladmin : <strong>'.$admin->name .' '. $admin->last_name .'</strong> a linker le calendrier <strong>'.$teatcher->name.' </strong>au maitre <strong>'.$teatcher->name.' </strong> est la matiere qui porte le nom' . $subject_the_class_id->subject->name . ' et la  class ' . $subject_the_class_id->the_class->name . '  </strong>.'.
        'les information du calendrier'  ;





      }

    }

  public static function repeatedEvent( $datas_repeated, $events ){

    $year = Session::get('yearId');

    if($datas_repeated->count()) {

      foreach( $datas_repeated as $data_repeated){

          $start_date = Carbon::parse( $data_repeated->start_date );
          $end_date = Carbon::parse( $data_repeated->start_date )->diffInSeconds( $data_repeated->end_date );
          $end_repeated_date = Carbon::parse( $data_repeated->end_repeated_date );

          //dd( $start_date->addDay() );

          for( $i = 0; $i <= 7; $i++ ){

            if( $start_date <= $end_repeated_date ){

              break;

            }

            $be_sure_to_not_change_date = Carbon::parse( $start_date );

            $events[] = \Calendar::event(
              $data_repeated->title, //event title
               $data_repeated->is_full_day, //full day event?
               Carbon::parse( $start_date ),
               Carbon::parse( $be_sure_to_not_change_date->addSeconds($end_date) ),
               $data_repeated->id,
               [
                   'color' => $data_repeated->background_color,
                   'url' => '#',
               ]
             );

             if( $data_repeated->repeated_type == 0 ){
               $start_date = Carbon::parse( $start_date->addDay() );
             }elseif( $data_repeated->repeated_type == 1 ){
               $start_date = Carbon::parse( $start_date->addWeek() );
             }elseif( $data_repeated->repeated_type == 2 ){
               $start_date = Carbon::parse( $start_date->addMonth() );
             }


          }

          $start_date = null;
          $end_date = null;
          $be_sure_to_not_change_date = null;
          $end_repeated_date = null;


        }

    }
    return $events;
  }

  public static function loadCalendarForClass(TheClass $class){

    $year = Session::get('yearId');

    $events = [];

    $ct = Relation::calendar_teat_ids_from_class($class);

    $data = Calendinar::whereIn('id', $ct )->where('repeated', false)->get();

    if($data->count()) {
        foreach ($data as $value) {
            $events[] = Calendar::event(
                $value->title,
                $value->is_full_day,
                new Carbon($value->start_date),
                new Carbon($value->end_date),
                $data->id,
                // Add color and link on event
             [
                 'color' => $value->background_color,
                 'url' => '#',
             ]

            );
        }
    }

    $datas_repeated = Calendinar::whereIn('id', $ct )->where('repeated', true)->get();


    $events = self::repeatedEvent($datas_repeated, $events);

    $calendar = Calendar::addEvents($events)
    ->setOptions([ //set fullcalendar options
        'firstDay' => 1,
        'header' => [
            'left' => 'prev,next today',
            'center' => 'title',
            'right' => 'month,agendaWeek,agendaDay'
            ],
        'buttonText' => [
            'today' => 'today',
            'month' => 'month',
            'week' => 'week',
            'day' => 'day'
            ],
        'editable' => true,
        'dropable' => true,
    ]);

    return $calendar;

  }

    public static function family_situation( $item = null ){
      if( $item ){
          return 'marié';
      }else{
          return 'célibataire';
      }
    }

    public static function fillPresentButton($model){

        $array = [];

        //dd($model);

        $present = $model->present;

        if( (bool) $present ){

            //$existArray[ 'icon' ] = '<i class="fa fa-check"></i>';
            $array[ 'icon' ] = 'V';
            $array[ 'class' ] = 'success';

        }else{

            //$existArray[ 'icon' ] = '';
            $array[ 'icon' ] = 'X';
            $array[ 'class' ] = 'danger';

        }


        return $array;
    }


    public static function formatDate4Html($date1){

          $d1 = new Carbon( $date1  );
          $date1 =  $d1->format('Y-m-d h:i');
          $ex = explode(" ",$date1);
          return implode("T",$ex);
    }

    public static function fillTerminatedButtonCalling($model){

        $array = [];


        //dd($model);

        $terminated = $model->terminated;
        $result = $model->result;

        if( (bool) $terminated ){

            //$existArray[ 'icon' ] = '<i class="fa fa-check"></i>';
            $array[ 'icon' ] = 'Términer';
            $array[ 'class' ] = 'success';

            if( $result == '' || $result == null ){

                $array[ 'icon' ] .= 'Un résultat doit etre ecrit le plus vite possible';

            }


        }else{

            //$existArray[ 'icon' ] = '<i class="fa fa-check"></i>';
            $array[ 'icon' ] = 'Pas encore términer';
            $array[ 'class' ] = 'danger';




        }


        return $array;
    }

    public static function fillRejectedButton($model){

        $array = [];

        //dd($model);

        $rejected = $model->rejected;

        if( (bool) $rejected ){

            //$existArray[ 'icon' ] = '<i class="fa fa-check"></i>';
            $array[ 'icon' ] = 'V';
            $array[ 'class' ] = 'success';

        }else{

            //$existArray[ 'icon' ] = '<i class="fa fa-check"></i>';
            $array[ 'icon' ] = 'X';
            $array[ 'class' ] = 'danger';

        }


        return $array;
    }

    public static function fillConfirmedButton($model){

        $array = [];

        //dd($model);

        $confirmed = $model->confirmed;

        if( (bool) $confirmed ){

            //$existArray[ 'icon' ] = '<i class="fa fa-check"></i>';
            $array[ 'icon' ] = 'V';
            $array[ 'class' ] = 'success';

        }else{

            //$existArray[ 'icon' ] = '<i class="fa fa-check"></i>';
            $array[ 'icon' ] = 'X';
            $array[ 'class' ] = 'danger';

        }


        return $array;
    }

    public static function fillReportedButton($model){

        $array = [];


        //dd($model);

        $reported = $model->reported;

        if( (bool) $reported ){

            //$existArray[ 'icon' ] = '<i class="fa fa-check"></i>';
            $array[ 'icon' ] = 'Deja reporté';
            $array[ 'class' ] = 'success';

        }else{

            //$existArray[ 'icon' ] = '<i class="fa fa-check"></i>';
            $array[ 'icon' ] = 'Reporter maintenent';
            $array[ 'class' ] = 'info';

        }


        return $array;
    }
/****************/







public static function fillGotButton(Fourniture $fourniture, User $parent, User $student){
  //check if his parent //else you have no permission
  //check if got
  //if big than zero button
        $relation = new Relation();
        $isParent = $relation->isParent($parent, $student);

        $existArray[ 'exist' ] = false;
        $existArray[ 'icon' ] = 'Tu as pas la permission de demander';
        $existArray[ 'class' ] = 'danger';


        if( $isParent ){

          if( $fourniture->got > 0){

            $existArray[ 'icon' ] = 'Il rest '.$fourniture->got ;
            $existArray[ 'exist' ] = true;
            $existArray[ 'class' ] = 'info';
          }else{

            $existArray[ 'icon' ] = 'Il nexist pas dans lecole';
            $existArray[ 'class' ] = 'default';

          }
        }


        return $existArray;
    }


/******************/


public static function fillExistButton($model){

    $existArray = [];

    //dd($model);

    $exist = $model->exist;

    if( (bool) $exist ){

        //$existArray[ 'icon' ] = '<i class="fa fa-check"></i>';
        $existArray[ 'icon' ] = 'V';
        $existArray[ 'class' ] = 'success';

    }else{

        //$existArray[ 'icon' ] = '<i class="fa fa-check"></i>';
        $existArray[ 'icon' ] = 'X';
        $existArray[ 'class' ] = 'danger';

    }

    $confirmed = (bool) $model->confirmed;
    $rejected = (bool) $model->rejected;
    $required = (bool) $model->fourniture->required;

    if(  $exist &&  $confirmed && !$rejected){

        $existArray[ 'statu' ] = '<p id="statu-'.$model->id.'">confirmé de puis ladministration</p>';

    }elseif( $exist && !$confirmed){

        $existArray[ 'statu' ] = '<p id="statu-'.$model->id.'">pas encore confirmé de puis ladministration</p>';

    }elseif( !$exist && $required){

        $existArray[ 'statu' ] = '<p id="statu-'.$model->id.'">Tu doit porter cette fourniture emidatement</p>';

    }elseif( !$model->exist && !$required){

        $existArray[ 'statu' ] = '<p id="statu-'.$model->id.'">Cette fourniture est optional</p>';

    }else{
        $existArray[ 'statu' ] = '<p id="statu-'.$model->id.'">Tu doit contacter ladministration apropos de cette fourniture</p>';
    }




    return $existArray;
}


/*********************/







    public static function fillMonthButton($model, $monthId, $year , $class){

        //$u = User::where('role', 1)->first();

        //dd($u->payments()->where('month_id', 9 )->where('year_id', 1 )->where('class_id', 5 )->first()

            $month = $model->payments()->where('month_id', $monthId )->where('year_id', $year )->where('the_class_id', $class )->first();

            $totalShouldPay = $month->should_pay + $month->add_classes_pay + $month->transport_pay;

            $moneyArray = Math::countMoney( $month->payment , $totalShouldPay );

            return $moneyArray;
    }

    public static function fillMonthButtonUser($model, $monthId, $year ){

            $month = $model->userpayments()->where('month_id', $monthId )->where('year_id', $year )->first();

            $totalShouldPay = $month->should_be_payed + $month->cnss_payment;

            $moneyArray = Math::countMoney( $month->payment , $totalShouldPay );

            return $moneyArray;
    }

    public static function fillBarMonthsBD( ){

        $months = Month::findMany([9, 10, 11, 12]);

        $year = Year::find(Session::get('yearId'));

        $catBenefits = HistoryCategory::where('kind', 2)->pluck('id');

        $catDefecits = HistoryCategory::where('kind', 0)->pluck('id');

        $arrayJson = [];

        $yearBD = ['y' => 'resultat finale de '.Session::get('yearName') , 'a' => 0, 'b' => 0 ];


        foreach ($months as $month) {
            # code...

            $monthBenifits = History::whereYear('created_at', '=', $year->min)
                  ->whereMonth('created_at', '=', $month->id)->whereIn('category_history_id', $catBenefits)->sum('payment');

            $monthDefecits = History::whereYear('created_at', '=', $year->min)
                  ->whereMonth('created_at', '=', $month->id)->whereIn('category_history_id', $catDefecits)->sum('payment');

            array_push( $arrayJson , [ 'y' => $month->name,'a' => $monthBenifits , 'b' => $monthDefecits ]);

            $yearBD['a'] += $monthBenifits;

            $yearBD['b'] += $monthDefecits;



        }

        $months = Month::findMany([1, 2, 3, 4, 5, 6, 7, 8 ]);


        foreach ($months as $month) {
            # code...

            $montheBenifits = History::whereYear('created_at', '=', $year->max)
                  ->whereMonth('created_at', '=', $month->id)->whereIn('category_history_id', $catBenefits)->sum('payment');

            $monthDefecits = History::whereYear('created_at', '=', $year->max)
                  ->whereMonth('created_at', '=', $month->id)->whereIn('category_history_id', $catDefecits)->sum('payment');

            array_push( $arrayJson , [ 'y' => $month->name,'a' => $monthBenifits , 'b' => $monthDefecits ]);

            $yearBD['a'] += $monthBenifits;

            $yearBD['b'] += $monthDefecits;

        }

        array_push( $arrayJson, $yearBD );

        return $arrayJson;

    }


}
