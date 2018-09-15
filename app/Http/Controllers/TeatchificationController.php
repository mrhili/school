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

use Relation;

use RealRashid\SweetAlert\Facades\Alert;

use ArrayHolder;

class TeatchificationController extends Controller
{

  public function multiLink()
  {
    // code...

    $year = Session::get('yearId');

    $teatchersModel = User::where('role','>=', 3 )->get(['id' ,'name', 'last_name', 'role']);

    $teatchers = [];

    foreach ($teatchersModel as $teatcher) {
      // code...
      $teatchers[ $teatcher->id ] = $teatcher->name.' '.$teatcher->last_name .',  -- -- role :'. ArrayHolder::roles( $teatcher->role )  ;

    }

    $subjects =  Subjectclass::where('year_id', $year )->get();

    $selection = [];

    foreach ($subjects as $subjectclass) {
      // code...
      $selection[ $subjectclass->id ] = $subjectclass->the_class->name.' => '.$subjectclass->subject->name ;

    }

    return view('back.teatchifications.multi-link',compact( 'teatchers', 'selection'));
  }

  public function storeMultiLink( Request $request ){

    foreach ($request->teatchers as $teatcher) {

      $teatcher = User::find( $teatcher );

      foreach ( $request->subject_classes as $subject_class ) {

        $subject_class = Subjectclass::find( $subject_class );

        Relation::linkTeatcher2Subject($request , $teatcher, $subject_class );

      }

      Alert::success('Les matier int bien etait linké', 'Success Message');

      return back()->withInput();

    }

  }

  public function link()
  {
    // code...

    $year = Session::get('yearId');

    $teatchifications = Teatchification::where('year_id', $year )->paginate(1);

    $teatchers = User::where('role', '>',3 )->pluck('name', 'id')->toArray();

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

    $teatchification = Relation::linkTeatcher2Subject($request, $teatcher, $subject_the_class_id);


    if( $teatchification ){
        return response()->json(['id' => $subject_the_class_id->id, 'teatcher' => $teatcher->name.' '.$teatcher->last_name, 'subject' => $subject_the_class_id->subject->name, 'class' => $subject_the_class_id->the_class->name ]);
    }


  }

}
