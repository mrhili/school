<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{
  User,
  Teatchification,
  Calendar,
  TheClass,
  Calendarteatchification,
  SubjectClass
};

use Session;
use History;
use Carbon;
use Application;
use Relation;

use Yajra\Datatables\Datatables;

class CalendarteatchificationController extends Controller
{
    //
    public function dataManagebyclass(TheClass $class){

      return Datatables::of( Relation::calendar_teat_ids_from_class($class) )

      ->editColumn('background_color', function( $model ){

         return '<div class="small-block" style="background_color:'.$model->calendar->background_color.'"></div>';

       })

    ->editColumn('subject', function( $model ){

         return $model->teatchification->subject->name;

     })
     ->editColumn('teatcher', function( $model ){

        return $model->teatchification->teatcher->name.' '.$model->teatchification->teatcher->last_name;

    })
    ->editColumn('start_date', function( $model ){

       return $model->calendar->start_date;

   })
   ->editColumn('repeated', function( $model ){

      return $model->calendar->repeated;

   })
   ->editColumn('repeated_type', function( $model ){

      return $model->calendar->repeated_type;

   })
   ->editColumn('is_all_day', function( $model ){

      return $model->calendar->is_all_day;

    })
   ->editColumn('end_date', function( $model ){

      return $model->calendar->end_date;

  })

    ->editColumn('end_repeated_date', function( $model ){

       return $model->calendar->end_repeated_date;

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

      $teatchers_subjects_intial = Teatchification::whereNotIn('id' , $used_teatchifications)->where('year_id', $year)->whereIn('the_class_id', $relatedToClass )->get();

      /***********************/

      $teatchers_subjects = [];

      foreach ( $teatchers_subjects_intial as $teatcher_subject ) {
        // code...
        $teatchers_subjects[ $teatchers_subjects_intial->id ] = $teatchers_subjects_intial->teatcher->name.' '.$teatchers_subjects_intial->teatcher->last_name.' -> '.$teatchers_subjects_intial->subject_class->name;

      }

      return view('back.calendarteatchifications.manage-byclass' , compact('class', 'calendar', 'teatchers_subjects'));

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

        /**********************/

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

        $creation['info'] = 'Ladmin : <strong>'.$admin->name .' '. $admin->last_name .'</strong> a linker le calendrier <strong>'.$teatcher->name.' </strong>au maitre <strong>'.$teatcher->name.' </strong> est la matiere qui porte le nom' . $subject_the_class_id->subject->name . ' et la  class ' . $subject_the_class_id->the_class->name . '  </strong>.'.
        'les information du calendrier'  ;

        History::create( $creation );



        /***********************/

        return response()->ajax([ ]);

      }



    }


}
