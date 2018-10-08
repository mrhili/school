<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PreperficationRequest;

use App\{
  Preperfication,
  TheClass,
  Subject,
  Subjectclass,
  Teatchification,
  User
};

use Auth;

use Application;

use Yajra\Datatables\Datatables;

class PreperficationController extends Controller
{

    public function student($student=null){

      if( $student!= null){

        $student = User::find( $student );
        
      }else{

        $student = Auth::user();

      }

      return view('back.preperfications.student', compact('student'));

    }

    public function studentData(User $student){

      return Datatables::of( Preperfication::where('student_id', $student->id )->get() )

        ->editColumn('teatcher',function($model){

          return $model->teatchification->teatcher->full_name;

        })

        ->editColumn('subject',function($model){

          return $model->teatchification->subject_class->subject->name;

        })

        ->editColumn('present',function($model){

          $array = Application::fillDynamicButton($model, 'present', [['icon' => 'Absent'], ['icon' => 'Present']]);

          return link_to('#', $array['icon'], ['class' => 'btn btn-'. $array['class'] .' btn-circle btn-present', 'data-id' => $model->id, 'id' => 'present-'.$model->id ], null);

        })
        ->editColumn('get_it',function($model){

          $array = Application::fillDynamicButton($model, 'get_it', [['icon' => 'Non Compris'], ['icon' => 'Compris']]);

          return link_to('#', $array['icon'], ['class' => 'btn btn-'. $array['class'] .' btn-circle btn-get-it', 'data-id' => $model->id, 'id' => 'get-it-'.$model->id ], null);

        })

        ->make(true);

    }



    public function manage($title){

      $preperfication =  Preperfication::where('title', $title)->first();

      return view('back.preperfications.manage', compact('preperfication'));

    }
    public function manageData($title){

      return Datatables::of( Preperfication::where('title', $title)->get() )

        ->editColumn('student',function($model){

          return $model->student->full_name;

        })

        ->editColumn('present',function($model){

          $array = Application::fillDynamicButton($model, 'present', [['icon' => 'Absent'], ['icon' => 'Present']]);

          return link_to('#', $array['icon'], ['class' => 'btn btn-'. $array['class'] .' btn-circle btn-present', 'data-id' => $model->id, 'id' => 'present-'.$model->id ], null);

        })
        ->editColumn('get_it',function($model){

          $array = Application::fillDynamicButton($model, 'get_it', [['icon' => 'Non Compris'], ['icon' => 'Compris']]);

          return link_to('#', $array['icon'], ['class' => 'btn btn-'. $array['class'] .' btn-circle btn-get-it', 'data-id' => $model->id, 'id' => 'get-it-'.$model->id ], null);

        })

        ->make(true);

    }

    public function switchPresent(Preperfication $preperfication){

      $preperfication->present = !$preperfication->present;
      $preperfication->save();

      $info = 'la preperfication : '.$preperfication->title.' a changer a '.
      ($preperfication->present? 'present': 'absent');

      Application::toHistory($preperfication,[
        55,
        $preperfication->present? 'success': 'danger',
        $info
      ]);

      $returnedArray = Application::fillDynamicButton($preperfication, 'present', [['icon' => 'Absent'], ['icon' => 'Present']]);

      return response()->json( $returnedArray );

    }

    public function switchGetIt(Preperfication $preperfication){

      $preperfication->get_it = !$preperfication->get_it;
      $preperfication->save();

      $info = 'la preperfication : '.$preperfication->title.' a changer a '.
      ($preperfication->get_it? 'compris': ' non compris');

      Application::toHistory($preperfication,[
        55,
        $preperfication->get_it? 'success': 'danger',
        $info
      ]);


      $returnedArray = Application::fillDynamicButton($preperfication, 'get_it', [['icon' => 'Pas Compris'], ['icon' => 'Compris']]);

      return response()->json( $returnedArray  );

    }

    public function delete(Request $request){

      $preperfications = Preperfication::where('title', $request->title)->get();

      $info = 'la preperfication avec le titre "'. $request->title .'" est suprimer';

      Application::toHistory($preperfications->first(),[
        56,
        'danger',
        $info
      ]);

      foreach($preperfications as $preperfication){

        Preperfication::find( $preperfication->id )->delete();

      }

      return response()->json( true );

    }

    public function new(PreperficationRequest $request,Teatchification $teatchification){




      foreach( $teatchification->subject_class->the_class->students as $student ){

        $preperfication = Preperfication::create([
          'student_id' => $student->id,
          'teatchification_id' => $teatchification->id,
          'title' => $request->title
        ]);

        if( $preperfication ){

          $info = 'La preperfication avec le titre <strong>'. $preperfication->title .
            '</strong>a etait creer pour la class'. $teatchification->subject_class->the_class->name.
            'et la matiére '. $teatchification->subject_class->subject->name;

          Application::toHistory( $preperfication,[
              54,
              'info',
              $info
            ],
            $request
          );



        }





      }



    }

    public function mineBySubClass(TheClass $class,Subject $subject){

      $subCourse = Subjectclass::where('subject_id', $subject->id)
        ->where('the_class_id', $class->id )
        ->where('year_id', $this->selected_year )
        ->first();


      if( $subCourse ){



        $teatchification = Teatchification::where('subject_the_class_id', $subCourse->id)
          ->where('year_id', $this->selected_year )
          ->where('user_id', Auth::id() )
          ->first();

        if( $teatchification ){

          return view('back.preperfications.mine-by-sub-class', compact('teatchification'));

        }else{
          return 'teatchification error';
        }

      }else{
        return 'subCourse error';
      }



    }




    public function byTeatchificationData(Teatchification $teatchification){


        return Datatables::of( Preperfication::select('title')->distinct()->where('teatchification_id', $teatchification->id )->get() )

        ->editColumn('manage', function( $model ){

            return link_to_route('preperfications.manage', 'Manage', [ $model->title ], ['class' => 'btn btn-info btn-circle btn-manage', 'target' => '_blank']);


         })

         ->editColumn('delete', function( $model ){

           return link_to('#', 'Suprimer', ['class' => 'btn btn-danger btn-circle btn-delete'  , 'data-id' => $model->title ], null);

          })

          ->make(true);



    }



}
