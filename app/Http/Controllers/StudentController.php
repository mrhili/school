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
    Fournituration
};

use Yajra\Datatables\Datatables;

use Auth;

use Alert;

use Session;

use Timing;

use Math;

use Application;

use Relation;

use ArrayHolder;

use Hash;

class StudentController extends Controller
{
    //

    public function home(){

        $user = Auth::user();

        $the_class_id = $user->payments()->where('year_id', Session::get('yearId')  )->first()->the_class_id ;

        $class = TheClass::find( $the_class_id );

        $ids = Subjectclass::where('the_class_id', $the_class_id)->pluck('id')->toArray();
//->
        $mytests = Testyearsubclass::whereIn('subject_the_class_id', $ids )->where('publish', true)->get();

        return view('back.students.home',compact('mytests'));
    }

    public function myProfile(){
        return 'myprofile';

    }

    public function profile(User $student){
        $year = Session::get('yearId');
        $notes = Note::where('student_id' , $student->id )->where('year_id' , $year )->count();
        $fournitures = Fournituration::where('student_id' , $student->id )->where('year_id' , $year )->count();
        return view('back.students.profile', compact('student', 'notes', 'fournitures'));

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

    	return view('back.users.add', compact('role', 'classes', 'categoryships'));
    }

    public function addStudentHistory($id, $comment, $hidden_note){

    }

    public function store(UserRequest $request){



    	$array = array_except( $request->toarray(), ['_token', 'password' ,'img', 'year_id', 'should_pay', 'transport_pay', 'add_class_pay','transport', 'add_classes', 'saving_pay', 'tars_assurence_pay','assurence_pay', 'imgparent', 'nameparent', 'last_nameparent', 'genderparent', 'birth_dateparent', 'birth_placeparent', 'cityparent', 'zip_codeparent', 'adressparent', 'phone1parent', 'phone2parent', 'phone3parent' , 'whatsappparent',  'fixparent', 'emailparent', 'passwordparent', 'categoryship', 'cinparent', 'professionparent', 'family_situationparent']);

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

            /*            $table->integer('should_pay')->default(350);
            $table->integer('transport_pay')->default(350);
            $table->integer('add_class_pay')->default(350);*/

            $transport_pay = ( $request->transport_pay ? $request->transport_pay : 0 );
            $add_class_pay = ( $request->add_class_pay ? $request->add_class_pay : 0 );
            $trans_assurence_pay = ( $request->trans_assurence_pay ? $request->trans_assurence_pay : 0 );

            Relation::fillStudentsPayment($student->id, $request->year_id , $request->class, $request->should_pay, $transport_pay, $add_class_pay, $request->saving_pay ,$request->assurence_pay ,$trans_assurence_pay );


            Relation::fillFournituration( $student->id , $request->year_id , $request->class   );

            $student->fill_payment = true;

            $student->save();

            //$this->addStudentHistory();


            $creation = [

                'id_link' => $student->id,
                'comment' => $request->comment,
                'hidden_note' => $request->hidden_note,
                'by-admin' => Auth::id(),

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



            $creation['info'] = "Un nouveau éléve c'est enregistrer dans la class <strong>". TheClass::find( $request->class )->name ."</strong>  qui port le nom complet de: <strong>". $student->last_name." ". $student->name ."</strong> avec un montant d'enregistrement <strong>". $request->saving_pay ." dh</strong> et d'assurence:  <strong>". $request->assurence_pay ." dh</strong> et ". $transSentence ."   et ". $addCoursesSentence ." et le montant qui doit payé pour lécole c'est <strong>". $request->should_pay ." dh</strong> par mois est cela c'est fait dans l'année <strong>".Year::find( $request->year_id )->name . "</strong> .";


            History::create($creation);

            /*Parent variable creation*/

            if( $request->hasFile( 'imgparent' ) ){

                $imgNameParent = CommonPics::storeFile( $request->imgparent , 'parents' );

                $arrayParent["img"] = $imgNameParent;

            }

            $arrayParent['name'] = $request->nameparent;
            $arrayParent['last_name'] = $request->last_nameparent;
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

            $parent = User::create($arrayParent);

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

                }

            History::create($creationHistoryParent);



            //Alert::success('Success Title', 'Success Message');

            return redirect()->route('students.all');

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

}
