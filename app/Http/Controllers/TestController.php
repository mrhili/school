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
use Carbon;
class TestController extends Controller
{



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

        return view('back.tests.show',compact('test'));
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


        return redirect()->route('notes.my-notes');

    }

    public function index(){

        $tests = Test::all();
        return view('back.tests.index', compact('tests'));

    }

    public function add($language = null){

        if( $language == null ){

            $language = GetSetting::getConfig('test-language');
        }

        return view('back.tests.add', compact('language'));
    }

    public function store(Request $request ){

        $test = Test::create(['body' => $request->body, 'title' => $request->title, 'notes' => $request->notes, 'time_minutes' => $request->time_minutes]);

        return redirect()->route('tests.get-answers', $test->id);

    }

    public function languageLinked($class_id,  $subject_id){
        return view('back.tests.language-linked', compact('class_id', 'subject_id'));
    }

    public function addLinked($class_id,  $subject_id, $language = null){
/*
        if( $language == null ){

            $language = GetSetting::getConfig('test-language');
        }
*/
        $year = Session::get('yearId');

        if( $language == null ){

            $language = 'fr-FR';
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

        $class = TheClass::find($class_id);
        $subject = Subject::find($subject_id);
        return view('back.tests.add-linked',compact('subject', 'class','language', 'courseArray'));
    }

    public function storeLinked(Request $request, $class_id,  $subject_id ){

        $test = Test::create([
          'body' => $request->body,
          'title' => $request->title,
          'notes' => $request->notes,
          'time_minutes' => $request->time_minutes,
          'notes' => $request->notes,
        ]);





        if($test){

            $subject_class = Subjectclass::where('the_class_id', $class_id)->where('subject_id', $subject_id)->first();

            if( $subject_class ){
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
                    'subject_the_class_id' => $subject_class->id,
                    'subject_id' => $subject_id,
                    'the_class_id' => $class_id,
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


                  return redirect()->route('tests.get-answers', $test->id);
                }else{
                  return back()->withInput();
                }



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

        $testsArray = Test::whereNotIn('id',  $testsMines )->pluck('title', 'id')->toArray();

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

    public function getAnswers(Test $test){

        return view('back.tests.get-answers',compact('test'));
    }

    public function postAnswers(Request $request, Test $test){

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
