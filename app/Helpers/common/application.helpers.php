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
    Transparancy,
    Demandefourniture,
    Calendar as Calendinar,
    Calendarteatchification,
    Biling,
    Wallet,
    Rule,
    Ruleholder
};

use MaddHatter\LaravelFullcalendar\Facades\Calendar;

use Session;
use Carbon;
use Auth;

use Relation;

use Illuminate\Http\Request;

use ArrayHolder;

use Validator;


class Application{


  public static $enabledDebuggar = [
    false,
    false,
    false,
    false,
    false,
    false,
    true,
  ];

  public static function setDebuggar($role , $method ='get'){


	  if($method == 'get' ){

	  	return self::$enabledDebuggar[ $role ];

	  }else if($method == 'change' ){

	  	self::$enabledDebuggar[ $role ] = !self::$enabledDebuggar[ $role ];

      return self::$enabledDebuggar[ $role ];

	  }

  }

  public static function fillDynamicButton($model, $dynamic, $array = null){

      $existArray = [];

      $ifTrue = $model->{$dynamic};

      if( $ifTrue ){

        if( $array != null){
          $existArray[ 'icon' ] = $array[1]['icon'];
          $existArray[ 'class' ] = ( array_key_exists('class',$array[1]) ? $array[1]['class'] : 'success');
        }else{
          $existArray[ 'icon' ] = 'Exist';
          $existArray[ 'class' ] = 'success';
        }

          //$existArray[ 'icon' ] = '<i class="fa fa-check"></i>';
      }else{

          //$existArray[ 'icon' ] = '<i class="fa fa-check"></i>';
          if( $array != null){
            $existArray[ 'icon' ] = $array[0]['icon'];
            $existArray[ 'class' ] = ( array_key_exists('class',$array[0]) ? $array[0]['class'] : 'danger');
          }else{
            $existArray[ 'icon' ] = 'Nexist pas';
            $existArray[ 'class' ] = 'danger';
          }
      }


      return $existArray;
  }

  public static function fillActiveButton(Rule $model){

      $existArray = [];

      //dd($model);

      $ifTrue = $model->active;

      if( $ifTrue ){

          //$existArray[ 'icon' ] = '<i class="fa fa-check"></i>';
          $existArray[ 'icon' ] = 'Activé';
          $existArray[ 'class' ] = 'success';

      }else{

          //$existArray[ 'icon' ] = '<i class="fa fa-check"></i>';
          $existArray[ 'icon' ] = 'Non Activé';
          $existArray[ 'class' ] = 'danger';

      }


      return $existArray;
  }


  public static function storeRule(Request $request, $getHolder = false){

    $request->validate([
            'rule' => 'required|unique:rules|max:255'
        ]);

    $array = [];
    $activated;
    $class;
    $array['rule'] = $request->rule;

    if( Auth::id() >= 5 ){

      $array['active'] = true;
      $activated = 'Activé';
      $class = 'success';

    }else{
      $activated = 'Doit etre Activé';
      $class = 'info';
    }
    $rule = Rule::create($array);

    $info = $rule->rule.' est elle est ' .$activated.' dans lecole';

    if( $rule ){
      Application::toHistory($rule, [
        49,
        $class,
        $info
      ], $request );

      if($request->take){

        $ruleHolder = Relation::linkRule($rule , Auth::user() );

      }

    }

    if($getHolder){
      return $ruleHolder;
    }

    return $rule;


  }



  public static function toHistory($model, $info ,$request = null){
    $histArr = [

        'id_link' => $model->id,
        'category_history_id' => $info[0],
        'class' => $info[1],
        'info' => $info[2]
    ];

    if(Auth::check()){
      $histArr['by_admin'] = Auth::id();
    }else{
      $histArr['by_exterior_name'] = $info[3];
    }

    if(!$request){

      $histArr['comment'] = 'No Comment';

    }else{

      $histArr['comment'] = $request->comment;
      $histArr['hidden_note'] = $request->hidden_note;
    }

    $history = History::create($histArr);
    return $history;
  }

  public static function toWallet(History $history, $amount){


    if( Auth::user()->role == 6 ){

      $walletArr = [
        'history_id' => $history->id,
        'amount' => $amount,
        'mines' => ( $amount < 0 )
      ];

      $wallet = Wallet::create( $walletArr );

      if( $wallet ){

        $walletHist = [
            'id_link' => $wallet->id,
            'comment' => 'no - comment',
            'by_admin' => Auth::id()
        ];

        if($amount> 0){

          $walletHist['category_history_id'] = 41;
          $walletHist['class'] = 'success';

          $walletHist['info'] = '<strong>'. $amount .' et entrer dans le wallet</strong>.';

        }else{

          $walletHist['category_history_id'] = 42;
          $walletHist['class'] = 'danger';
          $walletHist['info'] = '<strong>'. $amount .' et sortie de la wallet</strong>.';

        }


        $history = History::create( $walletHist );

      }

    }else{

      $transparancy = [
        'user_id' => Auth::id(),
        'amount' => abs( $amount ),
        'mines' => ( $amount < 0 )
      ];

      $transparancy = Transparancy::create( $transparancy );

      if($transparancy){

        $transHist = [
            'id_link' => $transparancy->id,
            'comment' => 'no - comment',
            'by_admin' => Auth::id()
        ];

        if($amount > 0){

          $transHist['category_history_id'] = 43;
          $transHist['class'] = 'warning';

          $transHist['info'] = '<strong>'. $amount .' </strong> et avec <strong>'.
          Auth::user()->name.' '.Auth::user()->last_name .' </strong>.';

        }else{

          $transHist['category_history_id'] = 44;
          $transHist['class'] = 'warning';

          $transHist['info'] = '<strong>'. $amount .' </strong> doit arriver à <strong>'.
          Auth::user()->name.' '.Auth::user()->last_name .' </strong>.';

        }

        $history = History::create( $transHist );

      }

    }

  }


  public static function fillPayedButton(Biling $model){

      $existArray = [];

      //dd($model);

      $payed = $model->payed;

      if( $payed ){

          //$existArray[ 'icon' ] = '<i class="fa fa-check"></i>';
          $existArray[ 'icon' ] = 'Payé';
          $existArray[ 'class' ] = 'success';

      }else{

          //$existArray[ 'icon' ] = '<i class="fa fa-check"></i>';
          $existArray[ 'icon' ] = 'Non payé';
          $existArray[ 'class' ] = 'danger';

      }

      return $existArray;
  }

  public static function fillTokeButton(Biling $model){

      $existArray = [];

      //dd($model);

      $toke = $model->toke;

      if( $toke ){

          //$existArray[ 'icon' ] = '<i class="fa fa-check"></i>';
          $existArray[ 'icon' ] = 'Pris';
          $existArray[ 'class' ] = 'success';

      }else{

          //$existArray[ 'icon' ] = '<i class="fa fa-check"></i>';
          $existArray[ 'icon' ] = 'Non pris';
          $existArray[ 'class' ] = 'danger';

      }


      return $existArray;
  }



  public static function studentpayment(User $student, Request $request){



                $year = Session::get('yearId');
                $transport_pay = ( $request->transport_pay ? $request->transport_pay : 0 );
                $add_class_pay = ( $request->add_class_pay ? $request->add_class_pay : 0 );
                $trans_assurence_pay = ( $request->trans_assurence_pay ? $request->trans_assurence_pay : 0 );

                Relation::fillStudentsPayment($student->id, $year , $request->class, $request->should_pay, $transport_pay, $add_class_pay, $request->saving_pay ,$request->assurence_pay ,$trans_assurence_pay );


                Relation::fillFournituration( $student->id , $year , $request->class   );

                Relation::testsYouShouldStart( $student );

                $student->fill_payment = true;

                $student->save();

                //$this->addStudentHistory();





                $creation = [

                    'id_link' => $student->id,
                    'comment' => $request->comment,
                    'hidden_note' => $request->hidden_note,
                    'by_admin' => Auth::id(),

                    'category_history_id' => 2,
                    'class' => 'success'

                    //'id_link' => $request->id_link,

                ];

                $transSentence;
                if( $request->transport ){
                    $transSentence = '<strong>avec le transport</strong> sous ladress  <strong>'. $request->adress .'</strong>  avec un montant décider de <strong>'. $request->transport_pay .' dh</strong> par mois et avec une assurence de trasport décider de <strong>'. $request->trans_assurence_pay .' dh</strong>.';
                }else{
                    $transSentence = '<strong>sans transport</strong> est sont adress est '. $request->adress;
                }

                $addCoursesSentence;
                if( $request->transport ){
                    $addCoursesSentence = '<strong>avec les cours suplementaires</strong> et avec un montant décider de <strong>'. $trans_assurence_pay .' dh </strong> par mois ';
                }else{
                    $addCoursesSentence = '<strong>sans les cours suplementaires</strong>';
                }



                $creation['info'] = "Un nouveau éléve c'est enregistrer dans la class <strong>". TheClass::find( $request->class )->name ."</strong>
                qui port le nom complet de: <strong>". $student->last_name." ". $student->name ."</strong>
                avec un montant d'enregistrement <strong>". $request->saving_pay ." dh</strong>
                et d'assurence:  <strong>". $request->assurence_pay ." dh</strong> et ". $transSentence ."   et ". $addCoursesSentence ."
                et le montant qui doit payé pour lécole c'est <strong>". $request->should_pay ." dh</strong> par mois
                est cela c'est fait dans l'année <strong>". Year::find( $year )->name . "</strong> .";


                History::create($creation);

  }


  public static function test_type($is_exercise){
    if( $is_exercise ){
      return 'exercise';
    }else{
      return 'test';
    }
  }

  public static function test_type_navigator($navigator){
    if( $navigator ){
      return 'avec recherche';
    }else{
      return 'sans recherche';
    }
  }

  public static function setYear(){
    if( Session::get('yearName') && Session::get('yearId')  ){

    }else{

      $thisYear = date("Y");
      $year;

      if( date('n') < 8 ){

        $year = Year::firstOrCreate(['max' => $thisYear ], [
          'max' => $thisYear ,
          'min' => ($thisYear-1) ,
          'name' => ($thisYear-1).'/'.$thisYear
        ]);

      }else{

        $year = Year::firstOrCreate(['min' => $thisYear ], [
          'min' => $thisYear ,
          'max' => ($thisYear+1) ,
          'name' => $thisYear.'/'.($thisYear+1)
        ]);

      }
        Session::put('yearName', $year->name );
        Session::put('yearId', $year->id );
    }
  }

  public static function method($method = null, $execution, $message = null){
    if ($method !== null) {

      if ($method !== 'ajax') {
          return;
      }

    }
    if ($message !== null) {

      $message = 'erro inputs';

    }
    /*Execution**/
    if( $execution == 'backinputs' ){

      if ($method !== null) {

        if ($method == 'ajax') {
          return response()->json(['error' => $message], 403);
        }else{
          return back()->withInput();
        }

      }

    }

  }

    public static function storeCalendar( Request $request , $role, $method = null){



      $startdate = Carbon::parse( $request->start_date );
      $enddate = $startdate->addMinutes( $request->end_date );

      $array = [
        'title' => $request->title,
        'start_date' => $request->start_date,
        'end_date' => $enddate->format('Y-m-d H:i:s'),
        'background_color' => $request->background_color,
        'role' => $role
      ];

      $enddate = $startdate->addMinutes( $request->end_date )->format('l jS \of F Y h:i:s A');
      $startdate = $startdate->format('l jS \\of F Y h:i:s A');

      $isallday = '';

      if( (boolean)$request->is_all_day ){
        $array['is_all_day'] = true;
        $isallday = 'pour tous le joure';
      }else{
        $array['is_all_day'] = false;
        $isallday = 'nest pas pour tous le joure';
      }



      $vacance;
      if( (boolean)$request->holiday ){
        $array['holiday'] = true;
        $vacance = '(cest une vacance)';
      }else{
        $array['holiday'] = false;
        $vacance = '';
      }

      $endrepeateddate;
      $repeated_sentence = '';



      if( (boolean) $request->repeated ){

        $vacance = 'répété';

        $validator = Validator::make($request->all(), [
          'repeated_type' => 'required',
          'end_repeated_date' => 'required'
        ]);


        if ($validator->fails()) {
            return null;
        }


        $array['repeated'] = true;
        $array['repeated_type'] = $request->repeated_type;
        $array['end_repeated_date'] = $request->end_repeated_date;


        $endrepeateddate = Carbon::parse( $request->end_repeated_date )->format('l jS \of F Y h:i:s A');

        $repeated_sentence = 'répété dans <strong>'.ArrayHolder::repeatedTypes( $request->repeated_type ).'</strong>
        est la répétition va términer <strong>'. $endrepeateddate .'</strong>';

      }else{
        $array['repeated'] = false;
        $array['repeated_type'] = null;
        $array['end_repeated_date'] = null;
      }



      $calendar = Calendinar::create( $array );



      if( $calendar ){

        $admin = Auth::user();

        $creation = [

            'id_link' => $calendar->id,
            'comment' => $request->comment,
            //lhomme a payeé un montant 500 dh de pour letudiant qui est dans la class 6  sur le payement du mois 6 sur lanée 2017/2018 et ila remplie le charge parsquil avait rien sur ce mois et il falait quil pay 700dh
            'info' => 'just talk',
            'hidden_note' => $request->hidden_note,
            'by_admin' => $admin->id,
            'category_history_id' => 32,
            'class' => 'success',
            //'id_link' => $request->id_link,

            ];

        $creation['info'] = 'Ladmin : <strong>'.$admin->name .' '. $admin->last_name .'</strong> a ajouter le calendrier <strong>'.$calendar->title.' </strong>au maitre <strong>'.
        'les information du calendrier sont : '.
        'il va debuter <strong>'. $startdate .'</strong>'.
        'jusqu a <strong>'. $enddate .'</strong> <br />'.
        '<strong>'. $isallday .'</strong> '.$vacance.' <br />'.
        $repeated_sentence ;

        return $calendar;

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

          do {

            $events[] = \Calendar::event(
              $data_repeated->title, //event title
               (boolean) $data_repeated->is_full_day, //full day event?
               Carbon::parse( $start_date ),
               Carbon::parse( $start_date->addSeconds($end_date) ),
               $data_repeated->id,
               [
                   'color' => $data_repeated->background_color,
                   'url' => $data_repeated->url
               ]
             );

             if( $data_repeated->repeated_type == 0 ){
               $start_date = Carbon::parse( $start_date->addDay() );
             }elseif( $data_repeated->repeated_type == 1 ){
               $start_date = Carbon::parse( $start_date->addWeek() );
             }elseif( $data_repeated->repeated_type == 2 ){
               $start_date = Carbon::parse( $start_date->addMonth() );
             }


          }while( $start_date <= $end_repeated_date );

          $start_date = null;
          $end_date = null;
          $be_sure_to_not_change_date = null;
          $end_repeated_date = null;


        }

    }
    return $events;
  }

    public static function loadCalendarForTeatcher(User $user){

      $year = Session::get('yearId');

      $events = [];

      $ct = Relation::calendar_teat_from_teatcher($user);

      $data = Calendinar::whereIn('id', $ct )->where('repeated', false)->get();

      if($data->count()) {
          foreach ($data as $value) {
              $events[] = Calendar::event(
                  $value->title,
                  (boolean) $value->is_full_day,
                  new Carbon($value->start_date),
                  new Carbon($value->end_date),
                  $value->id,
                  // Add color and link on event
               [
                   'color' => $value->background_color,
                   'url' => $value->url,
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

  public static function loadCalendarForClass(TheClass $class){

    $year = Session::get('yearId');

    $events = [];

    $ct = Relation::calendar_teat_ids_from_class($class);

    $data = Calendinar::whereIn('id', $ct )->where('repeated', false)->get();

    if($data->count()) {
        foreach ($data as $value) {
            $events[] = Calendar::event(
                $value->title,
                (boolean) $value->is_full_day,
                new Carbon($value->start_date),
                new Carbon($value->end_date),
                $value->id,
                // Add color and link on event
             [
                 'color' => $value->background_color,
                 'url' => $value->url,
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

        $isParent = Relation::isParent($parent, $student);

        $existArray[ 'exist' ] = false;
        $existArray[ 'icon' ] = 'Tu as pas la permission de demander';
        $existArray[ 'class' ] = 'danger';


        if( $isParent ){
          //$fourniture->got > 0
          if( true ){

          //  $existArray[ 'icon' ] = 'Il rest '.$fourniture->got ;
          $existArray[ 'icon' ] = 'Demande mintenent!' ;
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
        $existArray[ 'icon' ] = 'Exist';
        $existArray[ 'class' ] = 'success';

    }else{

        //$existArray[ 'icon' ] = '<i class="fa fa-check"></i>';
        $existArray[ 'icon' ] = 'Exist Pas';
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


public static function fillMonthButtonForChild(StudentsPayment $model){

        $totalShouldPay = $model->should_pay + $model->add_classes_pay + $model->transport_pay;

        $moneyArray = Math::countMoney( $model->payment , $totalShouldPay );

        return $moneyArray;
}




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
