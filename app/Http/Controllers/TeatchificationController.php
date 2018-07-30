<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\{
  User,
  Teatchification,
  The_class,
  Subject,
  Subjectclass,
  History
};

use Session;
use Auth;

class TeatchificationController extends Controller
{

  public function link()
  {
    // code...

    $year = Session::get('yearId');

    $teatchifications = Teatchification::where('year_id', $year )->get();

    $teatchers = User::where('role', 3 )->pluck('name', 'id')->toArray();

    $activated = Teatchification::where('year_id', $year )->pluck('subject_the_class_id')->toArray();

    $notActivated =  Subjectclass::where('year_id', $year )->whereNotIn('id', $activated )->get();

    //$selection =  Subjectclass::whereNotIn('id', $activated )->pluck('subject_id')->toArray();

    //$array_of_ids_subclass_names_subject = [];
    $selection = [];

    foreach ($notActivated as $subjectclass) {
      // code...

      $selection[ $subjectclass->id ] = $subjectclass->the_class->name.' => '.$subjectclass->subject->name ;

    }

    $activatedJson = Teatchification::where('year_id', $year )->pluck('subject_the_class_id')->toJson();


    return view('back.teatchifications.link',compact('teatchifications', 'teatchers', 'selection'));
  }

  public function storeLink( Request $request,User $teatcher, Subjectclass $subject_the_class_id ){

    $teatchification = Teatchification::create([
      'subject_the_class_id' => $subject_the_class_id->id,
      'user_id' => $teatcher->id,
      'year_id' => Session::get('yearId')
    ]);

    $admin = User::find( Auth::id() );

    $creation = [

        'id_link' => $teatchification->id,
        'comment' => $request->comment,
        //lhomme a payeé un montant 500 dh de pour letudiant qui est dans la class 6  sur le payement du mois 6 sur lanée 2017/2018 et ila remplie le charge parsquil avait rien sur ce mois et il falait quil pay 700dh
        'info' => 'just talk',
        'hidden_note' => $request->hidden_note,
        'by-admin' => $admin->id,
        'category_history_id' => 28,
        'class' => 'success',
        //'id_link' => $request->id_link,

        ];

    $creation['info'] = 'Ladmin : <strong>'.$admin->name .' '. $admin->last_name .'</strong> a linker le maitre <strong>'.$teatcher->name.' </strong> au subject qui porte le nom' . $subject_the_class_id->subject->name . ' au class ' . $subject_the_class_id->the_class->name . '  </strong>.'  ;

    History::create( $creation );

    if( $teatchification ){
        return response()->json(['id' => $subject_the_class_id->id, 'teatcher' => $teatcher->name.' '.$teatcher->last_name, 'subject' => $subject_the_class_id->subject->name, 'class' => $subject_the_class_id->the_class->name ]);
    }


  }

}
