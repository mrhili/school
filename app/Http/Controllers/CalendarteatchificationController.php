<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{
  User,
  Teatchification,
  Calendar,
  TheClass,
  Calendarteatchification,
  SubjectClass,
  History
};

use Session;
use Carbon;
use Application;
use Relation;
use Auth;
use ArrayHolder;

use Yajra\Datatables\Datatables;

class CalendarteatchificationController extends Controller
{
    //
    public function dataManagebyclass(TheClass $class){

      return Datatables::of( Relation::calendar_teat_from_class($class) )

      ->editColumn('background_color', function( $model ){

         return '<div class="small-block" style="background-color:'.$model->calendar->background_color.'"></div>';

       })

      ->editColumn('subject', function( $model ){

           return $model->teatchification->subject_class->subject->name;

       })

       ->editColumn('teatcher', function( $model ){

          return $model->teatchification->teatcher->name.' '.$model->teatchification->teatcher->last_name;

      })
        ->editColumn('start_date', function( $model ){

           return Carbon::parse( $model->calendar->start_date )->format('l jS \of F Y h:i:s A');

       })
       ->editColumn('repeated', function( $model ){

          if( $model->calendar->repeated ){

            return 'V -Répété';

          }else{
            return 'X -Non répété';
          }

       })
       ->editColumn('repeated_type', function( $model ){

         if( $model->calendar->is_all_day ){
           return ArrayHolder::repeatedTypes( $model->calendar->repeated_type );

         }else{
           return 'pour un certain moment';

         }

       })
       ->editColumn('is_all_day', function( $model ){

          if( $model->calendar->is_all_day ){
            return 'pour tout le joure';

          }else{
            return 'pour un certain moment';

          }

        })
       ->editColumn('end_date', function( $model ){

          return Carbon::parse( $model->calendar->end_date )->format('l jS \of F Y h:i:s A');

      })

      ->editColumn('end_repeated_date', function( $model ){

        if( $model->calendar->end_repeated_date ){

          return Carbon::parse( $model->calendar->end_repeated_date )->format('l jS \of F Y h:i:s A');

        }else{

          return 'X -Non répété';

        }



      })
      ->editColumn('action', function( $model ){

         return '';

      })
    ->rawColumns(['background_color', 'action'])

      ->make(true);

    }

    public function managebyclass(TheClass $class){

      $year = Session::get('yearId');

      $calendar = Application::loadCalendarForClass($class);

      /**** Not used Teatchification ***/

      $used_teatchifications = Calendarteatchification::get(['teatchification_id'])->toArray();

      $relatedToClass = SubjectClass::where('the_class_id', $class->id)->get(['id'])->toArray();

      $teatchers_subjects_intial = Teatchification::where('year_id', $year)
        //->whereNotIn('id' , $used_teatchifications)
        ->whereIn('subject_the_class_id', $relatedToClass )
        ->get();

      /***********************/

      $teatchers_subjects = [];

      foreach ( $teatchers_subjects_intial as $teatcher_subject ) {
        // code...
        $teatchers_subjects[ $teatcher_subject->id ] = $teatcher_subject->teatcher->name.' '.$teatcher_subject->teatcher->last_name.' -> '.$teatcher_subject->subject_class->subject->name;

      }

      $today = Carbon::now()->format('Y-m-d\TH:i:s');



      return view('back.calendarteatchifications.manage-byclass' , compact('class', 'calendar', 'teatchers_subjects', 'today'));

    }

    public function store(Request $request, Teatchification $teatchification ){

      $year = Session::get('yearId');

      $calendinar = Application::storeCalendar( $request , 1, 'ajax');

      if( $calendinar ){

        $calendarteatchification = Calendarteatchification::create([

          'teatchification_id' => $teatchification->id,
          'calendar_id' => $calendinar->id,
          'year_id' => $year,

        ]);

        if( $calendarteatchification ){

/******************/



          $admin = Auth::user();

          $creation = [

              'id_link' => $calendarteatchification->id,
              'comment' => $request->comment,
              //lhomme a payeé un montant 500 dh de pour letudiant qui est dans la class 6  sur le payement du mois 6 sur lanée 2017/2018 et ila remplie le charge parsquil avait rien sur ce mois et il falait quil pay 700dh
              'info' => 'just talk',
              'hidden_note' => $request->hidden_note,
              'by-admin' => $admin->id,
              'category_history_id' => 31,
              'class' => 'success',
              //'id_link' => $request->id_link,

              ];

          $creation['info'] = 'Ladmin : <strong>'.$admin->name .' '. $admin->last_name .'</strong> a linker
          le calendrier <strong>'.$calendarteatchification->calendar->title.' </strong>
          au maitre <strong>'.$teatchification->teatcher->name.' '.$teatchification->teatcher->last_name.' </strong>
          est la matiere qui porte le nom' . $teatchification->subject_class->subject->name . '
           et la  class ' . $teatchification->subject_class->the_class->name . '  </strong>.'  ;

          History::create( $creation );

          /***********************/
          $returned_array = [
            'id' => $calendarteatchification->id,
            'couleur' => $calendarteatchification->calendar->couleur,
            'subject' => $calendarteatchification->teatchification->subject_class->subject->name,
            'teatcher' => $calendarteatchification->teatchification->teatcher->name.' '.$calendarteatchification->teatchification->teatcher->last_name ,
            'start_date' => $calendarteatchification->calendar->start_date,
            'end_date' => $calendarteatchification->calendar->end_date
          ];

          if( $calendarteatchification->calendar->repeated ){

            $returned_array['repeated'] = $calendarteatchification->calendar->repeated;
            $returned_array['repeated_type'] = $calendarteatchification->calendar->repeated_type;
            $returned_array['repeated_end_time'] = $calendarteatchification->calendar->repeated_end_time;


          }

          return response()->json($returned_array);




  /**************/

        }

        /**********************/

      }else{

        Application::method('ajax', 'backinputs');


      }



    }


}
