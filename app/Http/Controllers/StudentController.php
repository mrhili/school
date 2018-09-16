<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

use CommonPics;

use App\{
    User,
    Year,
    TheClass,
    StudentsPayment,
    History,
    Categoryship,
    Relashionship,
    Testyearsubclass,
    Subjectclass,
    Test,
    Note,
    Fournituration,
    Teatchification
};

use App\Parsers\StudFromMassar;
use App\Exports\UsersExport;
//use Excel;
use Importer;

use Yajra\Datatables\Datatables;

use RealRashid\SweetAlert\Facades\Alert;

use Auth;

use Session;

use Timing;

use Math;

use Application;

use Relation;

use ArrayHolder;

use Hash;



class StudentController extends Controller
{

    public function addParent($student = null){

      if(!$student){

        $student = Auth::id();

      }

      $categoryships = Categoryship::pluck('name', 'id');

      return view('back.students.add-parent', compact('categoryships', 'student'));

    }

    public function addParentPost(Request $request, User $student){

      $array = array_except( $request->toarray(), [
        '_token',
         'password' ,
         'img',
          'categoryship',
          'family_situation'
        ]);


        if( $request->hasFile( 'img' ) ){

      		$imgName = CommonPics::storeFile( $request->img , 'parents' );

      		$array["img"] = $imgName;

      	}

        $maried;

        if( $request->family_situation ){

            $array["family_situation"] = true;
            $maried = "Marié";

        }else{
            $array["family_situation"] = false;
            $maried = "Célibataire";
        }

        $array["password"] = bcrypt($request->password );

        $array["role"] = 2;



        $parent = User::create($array);

        if( $parent ){

            $relationship = Relashionship::create([

            'student_id' => $student->id,
            'parent_id' => $parent->id,
            'categoryship_id' => $request->categoryship
                ]);

            if( $relationship){

              $creationHistoryParent = [

                  'id_link' => $parent->id,
                  'comment' => 'no comment',
                  'by-admin' => Auth::id(),

                  'category_history_id' => 3,
                  'class' => 'success'

              ];

              $creationHistoryParent['info'] = "Le parent <strong>".$parent->name.
              " ".$parent->last_name."</strong> a etait crée avec succes et il est relation en genre <strong>".
              $relationship->category->name ."</strong> avec létudiant <strong>".$student->name.
              " ".$student->last_name."</strong> qui port le <strong>id = ".$student->id.
              "</strong>est ses information personelle sont  => genre = <strong>".
              ArrayHolder::gender( $parent->gender) ."</strong>, Numero de la carte = <strong>".
              $parent->cin."</strong>, habite à <strong>".$parent->city."</strong>, code postal = <strong>".
              $parent->zip_code."</strong>, son adress est <strong>".
              $parent->adress."</strong>, son telephone 1  = <strong>".$parent->phone1.
              "</strong>, telephone 2  = <strong>".$parent->phone2.
              "</strong>, telephone 3  = <strong>".$parent->phone3.
              "</strong>, telephone fix = <strong>".$parent->fix."</strong>, sa profession est <strong>".
              $parent->profession."</strong>, sa cituation familiale est <strong>".
              $maried."</strong> ". "<strong>par son fils</strong>" .".";


              History::create($creationHistoryParent);


              return redirect()->route('parents.profile', $parent->id);

          }else{
              return 'no relationship';
          }



        }




    }

    public function changeClass4ThemPage(){

      $stds = User::where('role',1)->where('the_class_id', '!=', null)->orderBy('the_class_id', 'asc')->get();

      $students = [];

      foreach($stds as $std){



        $students[$std->id] = $std->the_class->name .' -> '.$std->name.' '.$std->last_name;

      }


      $classes = TheClass::get(['name', 'id'])->pluck('name', 'id');



      return view('back.students.migration',compact('classes', 'students'));

    }


      public function changeClass4Them(Request $request){

        foreach ($request->students as $student) {
          // code...

          $student = User::find( $student );

          Relation::changeClass4Student($request, $student) ;
        }

        Alert::success('Success Title', 'Changement avec success');

        return back();

      }


    public function profileByClass(TheClass $class){

      $students = $class->students;

      return view('back.students.all', compact( 'students' ));
    }

    public function correctNumberInEmail()
    {
        $stds = User::where('role', 1)->get();

        foreach($stds as $s){

          $pretendedEmail = str_slug( $s->name.'-'. $s->last_name , '-');
          $bones = '@fa.com';

          while( !User::where('email', $pretendedEmail.$bones ) ){

            $pretendedEmail .= rand( 0, 9 );

          }

          $s->email = $pretendedEmail.$bones;

          $s->save();

        }

        return "success";


    }

    public function correct()
    {
        $stds = User::where('role', 1)->get();

        foreach($stds as $s){

          $s->email = str_replace( "fa.com" ,"@fa.com" , $s->email );

          $s->save();

        }

        return "success";


    }



    //
    public function loginByClass($class){

    	$class = TheClass::find($class);

        $users = User::pluck('name', 'id');

    	return view('back.students.login-by-class', compact('class', 'users'));

    }

    public function dataLoginByClass($class){

    	$theclass = TheClass::find($class);

        $year = Session::get('yearId');

        return Datatables::of(User::where('role', 1)->where('the_class_id', $class)->get() )


            ->editColumn('site', function( $model ){

               return route('index');

           })
            ->editColumn('nomcomplet', function( $model ){

             return $model->name . ' '. $model->last_name;

         })

        ->editColumn('email', function( $model ) use($year, $theclass){

          return $model->email;


        })
        ->editColumn('password', function( $model ) use($year, $theclass){

            return $model->password;

        })

        ->make(true);

    }




    public function importExcel(){

      return view('back.students.import-excel');

    }

    public function postImportExcel( Request $request ){

      if($request->hasFile('sheet')){

          $filepath = $request->file('sheet')->getRealPath();
          $collection = Importer::make('Excel')
            ->load($filepath)

            ->setParser(new StudFromMassar)

            ->getCollection();

          return redirect()->route('students.validat-them');

      }else{
        return 'no file';
      }

    }

    public function validaTheme(){

      $classes = TheClass::get(['name', 'id'])->pluck('name', 'id');

      return view('back.students.validat-them', compact('classes') );

    }

    public function dataValidaTheme(){

      return Datatables::of( User::where('role', 1)->where('fill_payment', false )->get() )

      ->editColumn('class', function( $model ){

        return $model->zip_code;

     })
      ->editColumn('completename', function( $model ){

        return $model->name.' '.$model->last_name;

     })

      ->rawColumns([])

      ->make(true);
    }


    //delThem

    public function delThem(Request $request){




            $ids = json_decode( $request->ids , False );

            $students = User::findMany($ids);



            foreach($students as $student){

              $delStudent = User::find( $student->id );

              $delStudent->delete();

            }

            return response()->json(true);
    }





/******************/
    public function putValidaTheme(Request $request){

      $array = array_except( $request->toarray(), [
        '_token',
          'should_pay',
         'transport_pay',
          'add_class_pay',
        'transport',
         'add_classes',
          'saving_pay',
          'trans_assurence_pay',
         'assurence_pay'
          ]);

          if( $request->transport ){

              $array["transport"] = true;

          }else{
              $array["transport"] = false;
          }

          if( $request->add_classes ){

              $array["add_classes"] = true;
          }else{
              $array["add_classes"] = false;
          }


            $ids = json_decode( $request->ids , False );

            $students = User::findMany($ids);



            foreach($students as $student){

              $array['the_class_id'] = $request->class;

              $array['zip_code'] = '';

              $student->update($array);

              if( $student ){

                Application::studentpayment($student, $request);

              }

            }

            return response()->json(true);


    }

    public function docs($selected=null){
        /****************/

        $array =
        [
          'links' => [
            [
              "title" => "coucou" ,
              "panels" => [
                [
                  "title" => "panels 1 ",
                  "videos" => [
                    [
                      "title" => "video 1",
                      "href" => "https://www.youtube.com/embed/XNBeUmd5O9s",
                    "p" => "Lorem ipsum represents a fans."
                    ]
                  ]
                ]
              ]
            ]


          ]
        ];

        return view('back.docs.index',compact('array', 'selected'));
    }

    public function dashboard(User $student){


      if( ! Auth::user()->role >= 2 ){

        if ( ! Relation::isParent(Auth::user() , $student) ){

          return back();

        }

      }

      $year = Session::get('yearId');

      $teatchifications = Relation::uniqueTeatchificationFromstudent($year, $student);

      $ids = Subjectclass::where('year_id', $year)->where('the_class_id', $student->the_class_id )->pluck('id')->toArray();

      $mytests = Testyearsubclass::whereIn('subject_the_class_id', $ids )->where('publish', true)->get();

      $class = TheClass::find( $student->the_class_id );

      $calendar = Application::loadCalendarForClass( $class );

      return view('back.students.dashboard',compact('mytests', 'teatchifications', 'student', 'calendar'));

    }

    public function home(){

        $user = Auth::user();

        $year = Session::get('yearId');

        $teatchifications = Relation::uniqueTeatchificationFromstudent($year, $user);

        $ids = Subjectclass::where('year_id', $year)->where('the_class_id', $user->the_class_id )->pluck('id')->toArray();

        $mytests = Testyearsubclass::whereIn('subject_the_class_id', $ids )
        ->where('publish', true)
        ->where('year_id', $year)
        ->where('is_exercise', false)
        ->get();

        $myExercises = Testyearsubclass::whereIn('subject_the_class_id', $ids )
        ->where('publish', true)
        ->where('year_id', $year)
        ->where('is_exercise', true)
        ->get();

        $class = TheClass::find($user->the_class_id);

        $calendar = Application::loadCalendarForClass( $class );

        $scTeatchifications = Teatchification::whereIn('subject_the_class_id', $ids)->where('year_id', $year)->get();

        return view('back.students.home',compact('mytests', 'teatchifications',
         'calendar', 'scTeatchifications',
         'myExercises'
       ));
    }

    public function myProfile(){
        $year = Session::get('yearId');
        $notes = Note::where('student_id' , Auth::user()->id )->where('year_id' , $year )->count();
        $fournitures = Fournituration::where('student_id' , Auth::user()->id )->where('year_id' , $year )->count();
        $user = Auth::user();
        /****************/

        $passInfo = true;
        /*****************/
        return view('back.students.my-profile',compact('notes', 'fournitures', 'passInfo', 'user'));
    }

    public function profile(User $student){

      $user = $student;

      $year = Session::get('yearId');

      $notes = Note::where('student_id' , $student->id )->where('year_id' , $year )->count();
      $fournitures = Fournituration::where('student_id' , $student->id )->where('year_id' , $year )->count();

      /****************/
      $passInfo = false;
      $passChangeInfo = false;
      $passChangeSensibleInfo = false;
      if( Auth::check() ){

        if( Auth::user()->role > 4 ){

          $passInfo = true;
          $passChangeInfo = true;
          $passChangeSensibleInfo = true;

        }elseif( Auth::user()->role == 2 ){
          if(Auth::user()->relashionshipsStudentsParent()->where('student_id', $student->id)->first() ){
            $passInfo = true;
            $passChangeInfo = true;
          }

        }

      }


      /*****************/

      return view('back.students.profile', compact(
      'passInfo',
      'user', 'passChangeInfo', 'notes',
      'passChangeSensibleInfo',
       'fournitures'
         )
       );


    }

    public function all(){
        $students = User::where('role', 1)->get();
        return view('back.students.all', compact('students'));
    }

    public function show($id){
        $student = User::find($id);
        if($student->role == 1){

            return view('back.students.student',compact('student'));
        }else{
            return back();
        }

    }

    public function add(){



    	$classes = TheClass::pluck('name', 'id');
        $categoryships = Categoryship::pluck('name', 'id');
    	$role = 1;

      $maxNumber = User::where('role', 1)->max('num') + 1;

      $parents_rows = User::whereBetween('role', [1,2])->get(['id', 'name', 'last_name']);

      $parents = [];

      foreach( $parents_rows as $parent ){

        $parents[$parent->id] = $parent->name.' '.$parent->last_name;

      }

    	return view('back.users.add', compact('role', 'classes', 'categoryships', 'maxNumber', 'parents'));
    }

    public function addStudentHistory($id, $comment, $hidden_note){

    }

    public function store(UserRequest $request){

      $year = Session::get('yearId');

    	$array = array_except( $request->toarray(), [
        '_token',
         'password' ,
         'img',
          'should_pay',
         'transport_pay',
          'add_class_pay',
        'transport',
         'add_classes',
          'saving_pay',
          'trans_assurence_pay',
         'assurence_pay',
          'imgparent',
           'nameparent',
           'last_nameparent',
            'genderparent',
           'birth_dateparent',
           'birth_placeparent',
            'cityparent',
            'zip_codeparent',
             'adressparent',
            'phone1parent',
             'phone2parent',
            'phone3parent' ,
             'whatsappparent',
             'facebookparent',
               'fixparent',
             'emailparent',
              'passwordparent',
               'categoryship',
              'cinparent',
             'professionparent',
              'family_situationparent',
           'existparent',
         'categoryship']);

        $arrayParent = [];

    	if( $request->hasFile( 'img' ) ){

    		$imgName = CommonPics::storeFile( $request->img , 'students' );

    		$array["img"] = $imgName;

    	}

    	$array["password"] = bcrypt($request->password );

        $array["role"] = 1;

        if( $request->transport ){

            $array["transport"] = true;

        }else{
            $array["transport"] = false;
        }

        if( $request->add_classes ){

            $array["add_classes"] = true;
        }else{
            $array["add_classes"] = false;
        }

        $array['the_class_id'] = $request->class;

    	$student = User::create($array);


	    if ($student) {


            Application::studentpayment($student, $request);

            /*Parent variable creation*/

            if( $request->hasFile( 'imgparent' ) ){

                $imgNameParent = CommonPics::storeFile( $request->imgparent , 'parents' );

                $arrayParent["img"] = $imgNameParent;

            }

            $arrayParent['name'] = $request->nameparent;
            $arrayParent['last_name'] = $request->last_nameparent;
            $arrayParent['arabic_name'] = $request->arabic_nameparent;
            $arrayParent['arabic_last_name'] = $request->arabic_last_nameparent;
            $arrayParent['gender'] = $request->genderparent;
            $arrayParent['birth_date'] = $request->birth_dateparent;
            $arrayParent['birth_place'] = $request->birth_placeparent;
            $arrayParent['city'] = $request->cityparent;
            $arrayParent['zip_code'] = $request->zip_codeparent;
            $arrayParent['adress'] = $request->adressparent;
            $arrayParent['phone'] = $request->phone1parent;
            $arrayParent['phone2'] = $request->phone2parent;
            $arrayParent['phone3'] = $request->phone3parent;
            $arrayParent['fix'] = $request->fixparent;
            $arrayParent['whatsapp'] = $request->whatsappparent;
            $arrayParent['facebook'] = $request->facebookparent;

            $arrayParent['cin'] = $request->cinparent;
            $arrayParent['profession'] = $request->professionparent;
            $arrayParent['role'] = 2;

            $maried;

            if( $request->family_situationparent ){

                $arrayParent["family_situation"] = true;
                $maried = "Marié";

            }else{
                $arrayParent["family_situation"] = false;
                $maried = "Célibataire";
            }

            $arrayParent['email'] = $request->emailparent;
            $arrayParent['password'] = Hash::make($request->passwordparent);

            if( $request->existparent ){

              $parent = User::find( $request->parent_id );

            }else{

              $parent = User::create($arrayParent);

            }

            if( $parent ){

                $relationship = Relashionship::create([

                'student_id' => $student->id,
                'parent_id' => $parent->id,
                'categoryship_id' => $request->categoryship
                    ]);

                if( $relationship){

            $creationHistoryParent = [

                'id_link' => $parent->id,
                'comment' => $request->comment,
                'hidden_note' => $request->hidden_note,
                'by-admin' => Auth::id(),

                'category_history_id' => 3,
                'class' => 'success'

            ];

            $creationHistoryParent['info'] = "Le parent <strong>".$parent->name." ".$parent->last_name."</strong> a etait crée avec succes et il est relation en genre <strong>".$relationship->category->name ."</strong> avec létudiant <strong>".$student->name." ".$student->last_name."</strong> qui port le <strong>id = ".$student->id."</strong>
            est ses information personelle sont  => genre = <strong>". ArrayHolder::gender( $parent->gender) ."</strong>, Numero de la carte = <strong>".$parent->cin."</strong>, habite à <strong>".$parent->city."</strong>, code postal = <strong>".$parent->zip_code."</strong>, son adress est <strong>".$parent->adress."</strong>, son telephone 1  = <strong>".$parent->phone1."</strong>, telephone 2  = <strong>".$parent->phone2."</strong>, telephone 3  = <strong>".$parent->phone3."</strong>, telephone fix = <strong>".$parent->fix."</strong>, sa profession est <strong>".$parent->profession."</strong>, sa cituation familiale est <strong>".$maried."</strong> .";


            History::create($creationHistoryParent);

          }else{
              return 'no relationship';
          }





            //Alert::success('Success Title', 'Success Message');

              return redirect()->route('printables.new-student-with-parent',[ $student->id, $parent->id]  );

            }else{
              return 'no parent';
            }


	    }

    }

    public function byClass($class){

    	$class = TheClass::find($class);

        $users = User::pluck('name', 'id');

    	return view('back.students.byClass', compact('class', 'users'));

    }

    public function dataByClass($class){

    	$theclass = TheClass::find($class);

        $year = Session::get('yearId');





        return Datatables::of(User::where('role', 1)->where('the_class_id', $class)->get() )

        ->editColumn('nomcomplet', function( $model ){



         return $model->name . ' '. $model->last_name;

     })

        ->editColumn('saving', function( $model ) use($year, $theclass){

            $moneyArray = Application::fillMonthButton($model, 13 ,$year, $theclass->id );



            $label = $moneyArray['money'];
            $class = $moneyArray['class'];



            return link_to('#', $label, ['class' => 'btn btn-'. $class .' btn-circle btn-pay', 'data-toggle'=>'modal', 'data-target'=>'#modal-default', 'data-id' => $model->id, 'data-month' => 13, 'id' => $model->id.'-13' ], null);
        })
        ->editColumn('assurence', function( $model ) use($year, $theclass){

            $moneyArray = Application::fillMonthButton($model, 14 ,$year, $theclass->id );



            $label = $moneyArray['money'];
            $class = $moneyArray['class'];



            return link_to('#', $label, ['class' => 'btn btn-'. $class .' btn-circle btn-pay', 'data-toggle'=>'modal', 'data-target'=>'#modal-default', 'data-id' => $model->id, 'data-month' => 14, 'id' => $model->id.'-14' ], null);
        })
        ->editColumn('assurence_trans', function( $model ) use($year, $theclass){

            $moneyArray = Application::fillMonthButton($model, 15 ,$year, $theclass->id );



            $label = $moneyArray['money'];
            $class = $moneyArray['class'];



            return link_to('#', $label, ['class' => 'btn btn-'. $class .' btn-circle btn-pay', 'data-toggle'=>'modal', 'data-target'=>'#modal-default', 'data-id' => $model->id, 'data-month' => 15, 'id' => $model->id.'-15' ], null);
        })



        ->editColumn('septembre', function( $model ) use($year, $theclass){

            $moneyArray = Application::fillMonthButton($model, 9 ,$year, $theclass->id );



            $label = $moneyArray['money'];
            $class = $moneyArray['class'];



            return link_to('#', $label, ['class' => 'btn btn-'. $class .' btn-circle btn-pay', 'data-toggle'=>'modal', 'data-target'=>'#modal-default', 'data-id' => $model->id, 'data-month' => 9, 'id' => $model->id.'-9' ], null);
        })

        ->editColumn('octobre', function( $model ) use($year, $theclass){

            $moneyArray = Application::fillMonthButton($model, 10,$year, $theclass->id );



            $label = $moneyArray['money'];
            $class = $moneyArray['class'];

            return link_to('#', $label, ['class' => 'btn btn-'. $class .' btn-circle btn-pay', 'data-toggle'=>'modal', 'data-target'=>'#modal-default', 'data-id' => $model->id, 'data-month' => 10, 'id' => $model->id.'-10' ], null);
            })
        ->editColumn('novembre', function( $model ) use($year, $theclass){

            $moneyArray = Application::fillMonthButton($model, 11,$year, $theclass->id );



            $label = $moneyArray['money'];
            $class = $moneyArray['class'];

            return link_to('#', $label, ['class' => 'btn btn-'. $class .' btn-circle btn-pay', 'data-toggle'=>'modal', 'data-target'=>'#modal-default', 'data-id' => $model->id , 'data-month' => 11 , 'id' => $model->id.'-11' ], null);
            })
        ->editColumn('decembre', function( $model ) use($year, $theclass){

            $moneyArray = Application::fillMonthButton($model, 12,$year, $theclass->id );



            $label = $moneyArray['money'];
            $class = $moneyArray['class'];

            return link_to('#', $label, ['class' => 'btn btn-'. $class .' btn-circle btn-pay', 'data-toggle'=>'modal', 'data-target'=>'#modal-default', 'data-id' => $model->id , 'data-month' => 12, 'id' => $model->id.'-12' ], null);
            })
        ->editColumn('janvier', function( $model ) use($year, $theclass){

            $moneyArray = Application::fillMonthButton($model, 1,$year, $theclass->id );



            $label = $moneyArray['money'];
            $class = $moneyArray['class'];

            return link_to('#', $label, ['class' => 'btn btn-'. $class .' btn-circle btn-pay', 'data-toggle'=>'modal', 'data-target'=>'#modal-default', 'data-id' => $model->id ,'data-month' => 1, 'id' => $model->id.'-1' ], null);
            })
        ->editColumn('fevrier', function( $model ) use($year, $theclass){

            $moneyArray = Application::fillMonthButton($model, 2,$year, $theclass->id );



            $label = $moneyArray['money'];
            $class = $moneyArray['class'];

            return link_to('#', $label, ['class' => 'btn btn-'. $class .' btn-circle btn-pay', 'data-toggle'=>'modal', 'data-target'=>'#modal-default', 'data-id' => $model->id ,'data-month' => 2, 'id' => $model->id.'-2' ], null);
            })
        ->editColumn('mars', function( $model ) use($year, $theclass){

            $moneyArray = Application::fillMonthButton($model, 3,$year, $theclass->id );

            $label = $moneyArray['money'];
            $class = $moneyArray['class'];

            return link_to('#', $label, ['class' => 'btn btn-'. $class .' btn-circle btn-pay', 'data-toggle'=>'modal', 'data-target'=>'#modal-default', 'data-id' => $model->id ,'data-month' => 3, 'id' => $model->id.'-3' ], null);
            })
        ->editColumn('avril', function( $model ) use($year, $theclass){
            $moneyArray = Application::fillMonthButton($model, 4,$year, $theclass->id );



            $label = $moneyArray['money'];
            $class = $moneyArray['class'];

            return link_to('#', $label, ['class' => 'btn btn-'. $class .' btn-circle btn-pay', 'data-toggle'=>'modal', 'data-target'=>'#modal-default', 'data-id' => $model->id ,'data-month' => 4, 'id' => $model->id.'-4' ], null);
            })
        ->editColumn('mai', function( $model ) use($year, $theclass){

            $moneyArray = Application::fillMonthButton($model, 5,$year, $theclass->id );



            $label = $moneyArray['money'];
            $class = $moneyArray['class'];

            return link_to('#', $label, ['class' => 'btn btn-'. $class .' btn-circle btn-pay', 'data-toggle'=>'modal', 'data-target'=>'#modal-default', 'data-id' => $model->id ,'data-month' => 5, 'id' => $model->id.'-5' ], null);
            })
        ->editColumn('juin', function( $model ) use($year, $theclass){

            $moneyArray = Application::fillMonthButton($model, 6,$year, $theclass->id );



            $label = $moneyArray['money'];
            $class = $moneyArray['class'];

            return link_to('#', $label, ['class' => 'btn btn-'. $class .' btn-circle btn-pay', 'data-toggle'=>'modal', 'data-target'=>'#modal-default', 'data-id' => $model->id ,'data-month' => 6, 'id' => $model->id.'-6' ], null);
            })


        ->editColumn('action', function($model){
            return link_to('#', 'action', ['class' => 'btn btn-success btn-circle btn-click', 'data-toggle'=>'modal', 'data-target'=>'#modal-default', 'data-id' => $model->id ], null);
        })

        ->editColumn('del', function($model){
            return link_to_route('home', 'delete', [ $model->id ], ['class' => 'btn btn-danger btn-circle']);
        })

        ->make(true);

    }

    public function dataByTeatcher( User $teatcher){
      $year = Session::get('yearId');

      return Datatables::of(
        Relation::studentsFromTeatcher($year, $teatcher)
         )

         ->editColumn('img', function( $model ){

           //return link_to_route( 'students.profile' , $model->name.' '.$model->last_name, [ $model->id ], ['class' => 'btn btn-danger btn-circle']);
           return '<img src="'. CommonPics::ifImg( 'teatchers' ,  $model->img ) .'" class="img-responsive img-circle" width="150" height="150" />';
         })

      ->editColumn('namecomplet', function( $model ){

        return link_to_route( 'students.profile' ,$model->name.' '.$model->last_name, [ $model->id ], ['class' => 'btn btn-danger btn-circle']);

     })

     ->editColumn('dashboard', function( $model ){

       return link_to_route( 'students.dashboard' ,'Dashboard', [ $model->id ], ['class' => 'btn btn-danger btn-circle']);

    })

      ->rawColumns(['img', 'nomcomplete', 'dashboard'])

      ->make(true);

    }

}
