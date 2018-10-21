<?php

namespace App\Http\Controllers;

use App\{
    Test,
    TheClass,
    Subject,
    Subjectclass,
    Testyearsubclass,
    Courseyearsubclass,
    Note,
    User
};
use Illuminate\Http\Request;
use Session;
use Auth;
use GetSetting;
use Relation;
use ArrayHolder;
use Carbon;
use App\Helpers\Common\Pdfs as CommonPdfs;
use App\Helpers\Common\Documents as CommonDocs;

class TestController extends Controller
{




    public function addEditorLinked($language, Subjectclass $subclass){

        $courses = Courseyearsubclass::where('subject_the_class_id', $subclass->id)
          ->where('year_id', $this->selected_year )
          ->where('publish', true)
          ->get();

        $courseArray = [];

        foreach($courses as $course){
          $courseArray[ $course->id ] = $course->course->name.' by '.$course->teatcher->name.' '.$course->teatcher->last_name;
        }


        return view('back.tests.add-editor-linked',compact('subclass','language', 'courseArray'));
    }


        public function storeEditorLinked(Request $request, Subjectclass $subclass ){

            $test = Test::create([
              'kind' => 5,
              'body' => json_encode( $request->body  ),
              'title' => $request->title,
              'time_minutes' => $request->time_minutes,
              'notes' => $request->notes,
              'answers' => json_encode( $request->answers  ),
              'ready' => ( json_encode( $request->answers  ) ? true : false  )
            ]);




            if($test){

              if($test->ready){


                $publish;
                if( $request->publish ){

                    $publish = true;


                }else{

                    $publish = false;

                }

                $navigation;
                if( $request->navigation ){

                    $navigation = true;

                }else{

                    $navigation = false;

                }

                $isexercise;
                if( $request->is_exercise ){

                    $isexercise = true;

                }else{

                    $isexercise = false;

                }

                $testYSC = Testyearsubclass::create([
                    'year_id' => Session::get('yearId'),
                    'test_id' => $test->id,
                    'subject_the_class_id' => $subclass->id,
                    'subject_id' => $subclass->subject->id,
                    'the_class_id' => $subclass->the_class->id,
                    'teatcher_id' => Auth::id(),
                    'publish' => $publish,
                    'is_exercise' => $isexercise,
                    'end' => $request->end,
                    'navigator' => $navigation,
                    'course_id' => $request->beforeTest

                    ]);


                if( $testYSC ){

                  if($publish){

                    Relation::beginNoteCollections($testYSC);
                  }


                  return redirect()->route('tests.show-editor-with-answers', $test->id);
                }else{
                  return back()->withInput();
                }




              }








            }

        }





  /////////////////

  public function showEditorWithAnswers(Test $test){

    if($test->kind == 5){

      $answers = true;

      return view('back.tests.show-editor', compact('test', 'answers'));

    }else{
      return 'Kind Error';
    }

  }

  public function storeEditor(Request $request){
    $test = Test::create([
      'kind' => 5,
      'body' => json_encode( $request->body  ),
      'title' => $request->title,
      'answers' => json_encode( $request->answers  ),
      'time_minutes' => $request->time_minutes,
      'ready' => ( json_encode( $request->answers  ) ? true : false  )
    ]);

    return redirect()->route('tests.show-editor-with-answers', $test->id);
  }

  public function addEditor($language = null){

      return view('back.tests.add-editor', compact('language'));
  }

  public function showDocWithAnswers(Test $test){

    if($test->kind == 3){

      $answers = true;

      $body = json_decode( $test->body ,true);
      $answers_pdfs = json_decode( $test->answers ,true);

      return view('back.tests.show-doc',compact('test','body','answers', 'answers_pdfs'));

    }else{
      return 'Kind Error';
    }

  }


    public function addDoc($language = null){

        return view('back.tests.add-doc', compact('language'));
    }

    public function storeDoc(Request $request ){

        $test = Test::create([
          'kind' => 3,
          'title' => $request->title,
          'time_minutes' => $request->time_minutes
        ]);

        if($test){
          CommonDocs::storeDocs( $request , 0, $test , 'questions' );
          CommonDocs::storeDocs( $request , 0, $test , 'answers' );
        }

        if( $test->body != "[]"  && $test->answers != "[]"  ){
          $test->ready = true;
          $test->save();
        }

        return redirect()->route( 'tests.show-doc-with-answers', $test->id );
    }




  public function storePdfLinked(Request $request, Subjectclass $subclass ){

      $test = Test::create([
        'kind' => 3,
        'title' => $request->title,
        'time_minutes' => $request->time_minutes
      ]);

      if($test){
        CommonPdfs::storePdfs( $request , 0, $test , 'questions' );
        CommonPdfs::storePdfs( $request , 0, $test , 'answers' );

        if( $test->body != "[]"  && $test->answers != "[]"  ){

          $test->ready = true;
          $test->save();


            $publish;
            if( $request->publish ){

                $publish = true;


            }else{

                $publish = false;

            }

            $navigation;
            if( $request->navigation ){

                $navigation = true;

            }else{

                $navigation = false;

            }

            $isexercise;
            if( $request->is_exercise ){

                $isexercise = true;

            }else{

                $isexercise = false;

            }

            $testYSC = Testyearsubclass::create([
                'year_id' => Session::get('yearId'),
                'test_id' => $test->id,
                'subject_the_class_id' => $subclass->id,
                'subject_id' => $subclass->subject->id,
                'the_class_id' => $subclass->the_class->id,
                'teatcher_id' => Auth::id(),
                'publish' => $publish,
                'is_exercise' => $isexercise,
                'end' => $request->end,
                'navigator' => $navigation,
                'course_id' => $request->beforeTest

                ]);


            if( $testYSC ){

              if($publish){

                Relation::beginNoteCollections($testYSC);
              }



            }


        }

        return redirect()->route( 'tests.show-pdf-with-answers', $test->id );



      }else{

        return back()->withInput();

      }


  }



  public function addPdfLinked($language = null, SubjectClass $subclass ){


    $courses = Courseyearsubclass::where('subject_the_class_id', $subclass->id)
      ->where('year_id', $this->selected_year )
      ->where('publish', true)
      ->get();

    $courseArray = [];

    foreach($courses as $course){
      $courseArray[ $course->id ] = $course->course->name.' by '.$course->teatcher->name.' '.$course->teatcher->last_name;
    }

      return view('back.tests.add-pdf-linked', compact('language', 'subclass' , 'courseArray'));
  }

  public function showPdfWithAnswers(Test $test){

    if($test->kind == 3){

      $answers = true;

      $body = json_decode( $test->body ,true);
      $answers_pdfs = json_decode( $test->answers ,true);

      return view('back.tests.show-pdf',compact('test','body','answers', 'answers_pdfs'));

    }else{
      return 'Kind Error';
    }

  }

  public function addPdf($language = null){

      return view('back.tests.add-pdf', compact('language'));
  }

  public function storePdf(Request $request ){

      $test = Test::create([
        'kind' => 3,
        'title' => $request->title,
        'time_minutes' => $request->time_minutes
      ]);

      if($test){
        CommonPdfs::storePdfs( $request , 0, $test , 'questions' );
        CommonPdfs::storePdfs( $request , 0, $test , 'answers' );
      }

      if( $test->body != "[]"  && $test->answers != "[]"  ){
        $test->ready = true;
        $test->save();
      }

      return redirect()->route( 'tests.show-pdf-with-answers', $test->id );
  }





  public function confirmLinked(Request $request, Test $test, Subjectclass $subclass){

    if($test->kind == 1 ){

      $test->title = $request->title;
      $test->time_minutes = $request->time_minutes;



      if( $test->body != "[]"  && $test->answers != "[]"  ){


        $test->ready = true;



      }

      $test->save();





///////////////
///////////////
      if( $test->ready ){

        $publish;
        if( $request->publish ){

            $publish = true;


        }else{

            $publish = false;

        }

        $navigation;
        if( $request->navigation ){

            $navigation = true;

        }else{

            $navigation = false;

        }

        $isexercise;
        if( $request->is_exercise ){

            $isexercise = true;

        }else{

            $isexercise = false;

        }



        $testYSC = Testyearsubclass::create([
            'year_id' => Session::get('yearId'),
            'test_id' => $test->id,
            'subject_the_class_id' => $subclass->id,
            'subject_id' => $subclass->subject->id,
            'the_class_id' => $subclass->the_class->id,
            'teatcher_id' => Auth::id(),
            'publish' => $publish,
            'is_exercise' => $isexercise,
            'end' => $request->end,
            'navigator' => $navigation,
            'course_id' => $request->beforeTest

            ]);


        if( $testYSC ){

          if($publish){

            Relation::beginNoteCollections($testYSC);
          }

        }

      }

///////////////


      return redirect()->route('tests.show-images-with-answers', $test->id);

    }else{
      return 'We can not confirm that kind';
    }

  }




  public function addImagesLinked($language, Subjectclass $subclass){


      $courses = Courseyearsubclass::where('subject_the_class_id', $subclass->id)
        ->where('year_id', $this->selected_year )
        ->where('publish', true)
        ->get();

      $courseArray = [];

      foreach($courses as $course){
        $courseArray[ $course->id ] = $course->course->name.' by '.$course->teatcher->name.' '.$course->teatcher->last_name;
      }


      return view('back.tests.add-images-linked',compact('subclass','language', 'courseArray'));
  }






  public function showImagesWithAnswers(Test $test){

    if($test->kind == 1){

      $answers = true;

      $body = json_decode( $test->body ,true);
      $answers_images = json_decode( $test->answers ,true);

      return view('back.tests.show-images',compact('test','body','answers', 'answers_images'));

    }else{
      return 'Kind Error';
    }

  }



  public function confirm(Request $request, Test $test){

    if($test->kind == 1 ){

      $test->title = $request->title;
      $test->time_minutes = $request->time_minutes;


      if( $test->body != "[]"  && $test->answers != "[]"  ){

        $test->ready = true;

      }

      $test->save();

      return redirect()->route('tests.show-images-with-answers', $test->id);

    }else{
      return 'We can not confirm that kind';
    }

  }

  public function init($type){

    $test = Test::create([
      'kind' => $type,
      'body' => json_encode( []  ),
      'title' => 'random'.str_random(15),
      'answers' => json_encode( []  ),
      'time_minutes' => 60
    ]);

    if( $test ){
      return response()->json($test->toArray());
    }else{
      return response()->json(['message' => 'cant initialize test'], 500);
    }



  }

  public function addImages($language = null){

      return view('back.tests.add-images', compact('language'));
  }

  public function addLinkLinked($language, Subjectclass $subclass){


      $courses = Courseyearsubclass::where('subject_the_class_id', $subclass->id)
        ->where('year_id', $this->selected_year )
        ->where('publish', true)
        ->get();

      $courseArray = [];

      foreach($courses as $course){
        $courseArray[ $course->id ] = $course->course->name.' by '.$course->teatcher->name.' '.$course->teatcher->last_name;
      }


      return view('back.tests.add-link-linked',compact('subclass','language', 'courseArray'));
  }




      public function storeLinkLinked(Request $request, Subjectclass $subclass ){

          $test = Test::create([
            'kind' => 0,
            'body' => json_encode( $request->body  ),
            'title' => $request->title,
            'time_minutes' => $request->time_minutes,
            'notes' => $request->notes,
            'answers' => json_encode( $request->answers  ),
            'ready' => (json_encode( $request->answers  ) ? true: false )
          ]);




          if($test){

            if( $test->ready ){

                                $publish;
                                if( $request->publish ){

                                    $publish = true;


                                }else{

                                    $publish = false;

                                }

                                $navigation;
                                if( $request->navigation ){

                                    $navigation = true;

                                }else{

                                    $navigation = false;

                                }

                                $isexercise;
                                if( $request->is_exercise ){

                                    $isexercise = true;

                                }else{

                                    $isexercise = false;

                                }

                                $testYSC = Testyearsubclass::create([
                                    'year_id' => Session::get('yearId'),
                                    'test_id' => $test->id,
                                    'subject_the_class_id' => $subclass->id,
                                    'subject_id' => $subclass->subject->id,
                                    'the_class_id' => $subclass->the_class->id,
                                    'teatcher_id' => Auth::id(),
                                    'publish' => $publish,
                                    'is_exercise' => $isexercise,
                                    'end' => $request->end,
                                    'navigator' => $navigation,
                                    'course_id' => $request->beforeTest

                                    ]);




                      if( $testYSC ){

                        if($publish){

                          Relation::beginNoteCollections($testYSC);
                        }



                      }

            }




            return redirect()->route('tests.show-link-with-answers', $test->id);

          }else{
            return back()->withInput();
          }

      }







  public function addLink($language = null){

      return view('back.tests.add-link', compact('language'));
  }

  public function storeLink(Request $request ){

      $test = Test::create([
        'kind' => 0,
        'body' => json_encode( $request->body  ),
        'title' => $request->title,
        'answers' => json_encode( $request->answers  ),
        'time_minutes' => $request->time_minutes,
        'ready' => (json_encode( $request->answers  ) ? true: false )
      ]);

      return redirect()->route('tests.show-link-with-answers', $test->id);

  }



  public function showLinkWithAnswers(Test $test){

    if($test->kind == 0){

      $answers = true;

      return view('back.tests.show-link', compact('test', 'answers'));

    }else{
      return 'Kind Error';
    }

  }

  public function types( $class = null,  $subject = null){

      return view('back.tests.types',compact('class', 'subject'));
  }

  public function type($type, $language , $class = null,  $subject = null ){


    if($class != null && $subject != null){

      $subclass = Subjectclass::where('the_class_id', $class )
        ->where('subject_id', $subject )->first();

      if($subclass){
        $subclass = $subclass->id;
      }

      if($type == 0 ){
        return redirect()->route('tests.add-link-linked',compact('language','subclass') );
      }elseif( $type == 1 ){
        return redirect()->route('tests.add-images-linked',compact('language','subclass') );
      }elseif( $type == 2 ){
        return redirect()->route('tests.add-online-linked',compact('language','subclass') );
      }elseif( $type == 3 ){
        return redirect()->route('tests.add-pdf-linked',compact('language','subclass') );
      }elseif( $type == 4 ){
        return redirect()->route('tests.add-doc-linked',compact('language','subclass') );
      }elseif( $type == 5 ){
        return redirect()->route('tests.add-editor-linked',compact('language','subclass') );
      }else{
        return 'notExisted Yet';
      }

    }else{

      if($type == 0 ){
        return redirect()->route('tests.add-link',compact('language') );
      }elseif( $type == 1 ){
        return redirect()->route('tests.add-images',compact('language') );
      }elseif($type == 2 ){
        return redirect()->route('tests.add-online',compact('language') );
      }elseif( $type == 3 ){
        return redirect()->route('tests.add-pdf',compact('language') );
      }elseif( $type == 4 ){
        return redirect()->route('tests.add-doc',compact('language') );
      }elseif( $type == 5 ){
        return redirect()->route('tests.add-editor',compact('language') );
      }else{
        return 'notExisted Yet';
      }

    }

  }

  public function teatcherTests(User $teatcher){

    //dd( $this->selected_year );

    $year = Session::get('yearId');

    $testYSC = Testyearsubclass::where('teatcher_id', $teatcher->id )
    ->where('year_id', $year)
    ->latest()
    ->paginate(3);

    return view('back.tests.teatcher-tests', compact('testYSC', 'teatcher') );
  }




    public function show(Test $test){

      if( $test->kind == 1){
        $body = json_decode( $test->body ,true);
        $answers = json_decode( $test->answers ,true);
        return view('back.tests.show-images',compact('test','body', 'answers'));

      }elseif( $test->kind == 2){
        return view('back.tests.show-online',compact('test'));
      }else{
        return 'we can not show';
      }


    }

    public function language(){
        return view('back.tests.language');
    }

    public function passTest(Testyearsubclass $test){


        $year = Session::get('yearId');
        $user = Auth::user();

        if($user->role < 3){
            $note = Note::where('year_id', $year)
                ->where('testyearsubclass_id', $test->id )
                ->where('student_id', Auth::id() )
                ->first();

            if(!$note){ return 'there is a problem check the administration - n'; }
            if(!$test->publish){ return 'there is a problem check the administration - n'; }

            if(!$test->is_exercise && $note->test_passed_fine){

              return 'You passed that test';

            }

          }
/*
          $adate= date("Y/m/d H:i:s");
          $dateinsec=strtotime($adate);

          $duration= ( $test->time_minutes * 60 ) + 60;


          $newdate=$dateinsec+$duration;

          $date = date('Y/m/d H:i:s',$newdate);

          //$date = Carbon::parse( $date );
          //dd( $date );
*/
          return view('back.tests.pass', compact('test', 'note'));


    }

    public function getNote(Request $request, Testyearsubclass $test, Note $note){

        $student_answers = array_except($request->all(), ['_token','done_minutes']);
        $answers = json_decode($test->test->answers, true);
        $notes = json_decode($test->test->notes, true);
        //dd($student_answers , '------------', $answers , '------------', $notes );
        $final_note = 0;

        foreach ($notes as $value) {
            # code...
            if( $answers[ $value['name'] ] == $student_answers[ $value['name'] ]  ){

                $final_note += (double)$value['note'] ;

            }

        }

        if(!$test->is_exercise || ( $test->is_exercise && $note->note < $final_note )  ){
          $note->note = $final_note;




          $minutes = $request->done_minutes / 60;
          $minutes = (int)$minutes;
          $seconds = $request->done_minutes % 60;

          if( $minutes < 10){

              $minutes = "0".$minutes;

          }

          if( $seconds < 10){

              $seconds = "0".$seconds;

          }

          $note->done_minutes = $minutes.":".$seconds;

          $note->test_passed_fine = true;
          $note->save();

        }


        return redirect()->route('notes.student-notes', Auth::id() );

    }

    public function index(){

        $tests = Test::all();
        return view('back.tests.index', compact('tests'));

    }

    public function addOnline($language = null){

        if( $language == null ){

            $language = GetSetting::getConfig('test-language');
        }

        return view('back.tests.add-online', compact('language'));
    }

    public function storeOnline(Request $request ){



        $test = Test::create(['kind' => 2,
        'body' => $request->body,
        'title' => $request->title,
        'notes' => $request->notes,
        'time_minutes' => $request->time_minutes]);

        return redirect()->route('tests.get-online-answers', $test->id);

    }


    public function addOnlineLinked($language, Subjectclass $subclass){



        $courses = Courseyearsubclass::where('subject_the_class_id', $subclass->id)
          ->where('year_id', $this->selected_year )
          ->where('publish', true)
          ->get();

        $courseArray = [];

        foreach($courses as $course){
          $courseArray[ $course->id ] = $course->course->name.' by '.$course->teatcher->name.' '.$course->teatcher->last_name;
        }


        return view('back.tests.add-online-linked',compact('subclass','language', 'courseArray'));
    }

    public function storeOnlineLinked(Request $request, Subjectclass $subclass ){

        $test = Test::create([
          'kind' => 2,
          'body' => $request->body,
          'title' => $request->title,
          'notes' => $request->notes,
          'time_minutes' => $request->time_minutes,
          'notes' => $request->notes,
        ]);


        if($test){

                $publish;
                if( $request->publish ){

                    $publish = true;


                }else{

                    $publish = false;

                }

                $navigation;
                if( $request->navigation ){

                    $navigation = true;

                }else{

                    $navigation = false;

                }

                $isexercise;
                if( $request->is_exercise ){

                    $isexercise = true;

                }else{

                    $isexercise = false;

                }

                $testYSC = Testyearsubclass::create([
                    'year_id' => Session::get('yearId'),
                    'test_id' => $test->id,
                    'subject_the_class_id' => $subclass->id,
                    'subject_id' => $subclass->subject->id,
                    'the_class_id' => $subclass->the_class->id,
                    'teatcher_id' => Auth::id(),
                    'publish' => $publish,
                    'is_exercise' => $isexercise,
                    'end' => $request->end,
                    'navigator' => $navigation,
                    'course_id' => $request->beforeTest

                    ]);


                if( $testYSC ){

                  if($publish){

                    Relation::beginNoteCollections($testYSC);
                  }


                  return redirect()->route('tests.get-online-answers', $test->id);
                }else{
                  return back()->withInput();
                }






        }

    }

    public function addLinkedLinking($class_id,  $subject_id){

        $year = Session::get('yearId');
        $class = TheClass::find($class_id);
        $subject = Subject::find($subject_id);
        $subject_class = Subjectclass::where('the_class_id', $class_id)->where('subject_id', $subject_id)->first();

        $testsyearMines = $subject_class->testyearsubclasses()->get(['id'])->toArray();

        $testsMines = Testyearsubclass::whereIn('id', $testsyearMines )->get(['test_id'])->toArray();

        $tests = Test::find( $testsMines );

        $testsArray = [];

        foreach(Test::whereNotIn('id',  $testsMines )->get() as $test ){
          $testsArray[ $test->id ] = $test->title.' [ '. ArrayHolder::testTypes( $test->kind )[1] . '] ';
        }


        $courses = Courseyearsubclass::where('the_class_id', $class_id)
          ->where('subject_id', $subject_id)
          ->where('year_id', $year)
          ->where('publish', true)
          ->get();

        $courseArray = [];

        foreach($courses as $course){
          $courseArray[ $course->id ] = $course->course->name.' by '.$course->teatcher->name.' '.$course->teatcher->last_name;
        }

        return view('back.tests.add-linked-linking',compact('subject', 'class', 'testsArray', 'tests','courseArray'));
    }
    public function storeLinkedLinking(Request $request,Test $test, $class_id,  $subject_id ){
        $class = TheClass::find($class_id);
        $subject = Subject::find($subject_id);
        $subject_class = Subjectclass::where('the_class_id', $class_id)->where('subject_id', $subject_id)->first();

        if( $request->publish ){

            $publish = true;

        }else{

            $publish = false;

        }

        $navigation;
        if( $request->navigation ){

            $navigation = true;

        }else{

            $navigation = false;

        }

        $isexercise;
        if( $request->is_exercise ){

            $isexercise = true;

        }else{

            $isexercise = false;

        }

        $testYSC = Testyearsubclass::create([
            'year_id' => Session::get('yearId'),
            'test_id' => $test->id,
            'subject_id' => $subject_id,
            'the_class_id' => $class_id,
            'subject_the_class_id' => $subject_class->id,
            'teatcher_id' => Auth::id(),
            'publish' => $publish,
            'navigator' => $navigation,
            'end' => $request->end,
            'is_exercise' => $isexercise,
            'course_id' => $request->beforeTest
        ]);


        if( $testYSC ){
          if($publish){
            Relation::beginNoteCollections($testYSC);
          }


          return response()->json(['id' => $test->id, 'name' => $test->title ]);
        }else{
          return response()->json(['message' => 'faild testYSC'], 503);
        }



    }

    public function getOnlineAnswers(Test $test){

        return view('back.tests.get-online-answers',compact('test'));
    }

    public function postOnlineAnswers(Request $request, Test $test){

        $rArray = $request->all();

        $questions = json_decode($test->body, true);

        //dd($questions, $rArray);

        $aJSON = [];

        foreach ($questions as $key => $question) {
            # code...
            if (array_key_exists("name", $question)){
                $aJSON[ $question['name'] ] = $rArray[ $question['name'] ] ;
              }

        }

        //dd( $aJSON );

        $test->answers =  json_encode($aJSON);
        $test->ready =  true;

        $test->save();

        return redirect()->route('tests.index');

    }

    public function test(){

        $test = Test::find(1);

        return $test;
    }

}
