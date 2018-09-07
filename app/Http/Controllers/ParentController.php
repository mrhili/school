<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\{
  User,
  History,
  Categoryship,
  Relashionship
};
use Auth;

use Application;

use Relation;

use ArrayHolder;

use Session;

class ParentController extends Controller
{
  public function add($student = null){

    $categoryships = Categoryship::pluck('name', 'id');

    $maxNumber = User::where('role', 1)->max('num') + 1;


    $students_rows = User::where('role', 1)->get(['id', 'name', 'last_name']);

    $students = [];

    foreach( $students_rows as $student ){

      $students[ $student->id] = $student->name.' '.$student->last_name;

    }

    $parents_rows = User::where('role', 2)->get(['id', 'name', 'last_name']);

    $parents = [];

    foreach( $parents_rows as $parent ){

      $parents[$parent->id] = $parent->name.' '.$parent->last_name;

    }


    return view('back.parents.add',compact('student', 'students', 'categoryships', 'parents' ));

  }

  public function store(UserRequest $request){

    //dd( $this->selected_year );

    $student = User::find( $request->student );

    if( $student ){




          $array = array_except( $request->toarray(), [
            '_token',
             'password' ,
             'img',
             'family_situation',
          ]);

          if( $request->hasFile( 'img' ) ){

            $imgName = CommonPics::storeFile( $request->img , 'parents' );

            $array["img"] = $imgName;

          }



          	$array["password"] = bcrypt($request->password );

            $array["role"] = 2;

            $maried;

            if( $request->family_situation ){

                $array["family_situation"] = true;
                $maried = "Marié";

            }else{
                $array["family_situation"] = false;
                $maried = "Célibataire";
            }

          $parent = User::create($array);

          if( $parent ) {
            // code...
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

                return redirect()->route('printables.new-student-with-parent',[ $student->id, $parent->id]  );


              }else{
                  return 'no relationship';
              }

          }

    }else {
      return 'no student';
    }

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

    //

    public function profile(User $user){

      $year = Session::get('yearId');


      /****************/
      $passInfo = true;
      $passChangeInfo = false;
      if( Auth::check() ){

        if( Auth::user()->role > 1 ){
          $passChangeInfo = true;

        }

      }


      /*****************/

      return view('back.parents.profile', compact('passInfo', 'user', 'passChangeInfo'));


    }





    public function myProfile(){


        /****************/

        $passInfo = true;
        /*****************/
        $user = Auth::user();
        return view('back.parents.my-profile',compact('passInfo', 'user'));
    }

    public function all(){
    	$parents = User::where('role', 2)->get();
        return view('back.parents.all',compact('parents'));
    }

    public function home(){

        $user = Auth::user();

        $childs = $user->relashionshipsStudentsParent;

        $year = Session::get('yearId');

        return view('back.parents.home',compact('childs', 'year'));
    }

}
