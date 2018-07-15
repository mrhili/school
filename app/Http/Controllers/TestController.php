<?php

namespace App\Http\Controllers;

use App\{
    Test,
    TheClass,
    Subject,
    Subjectclass,
    Testyearsubclass,
    Note
};
use Illuminate\Http\Request;
use Session;
use Auth;
use GetSetting;
class TestController extends Controller
{
    public function language(){
        return view('back.tests.language');
    }

    public function passTest(Test $test, Subjectclass $subjectclass ){


        $year_id = Session::get('yearId');

        $testyearsubclass = Testyearsubclass::where('year_id', $year_id)
            ->where('subject_the_class_id', $subjectclass->id)
            ->where('the_class_id', $subjectclass->the_class_id)
            ->where('subject_id', $subjectclass->subject_id)
            ->where('test_id', $test->id )
            ->where('publish', true)
            ->first();
        if($testyearsubclass === null){

            return 'there is a problem check the administration';

        }


        $checkifpassed = Note::where('year_id', $year_id)
            ->where('testyearsubclass_id', $testyearsubclass->id )
            ->where('subject_the_class_id', $subjectclass->id)
            ->where('the_class_id', $subjectclass->the_class_id)
            ->where('subject_id', $subjectclass->subject_id)
            ->where('teatcher_id', $testyearsubclass->teatcher_id)
            ->where('student_id', Auth::id())
            ->first();

        if($checkifpassed === null){


            $note = Note::create([
                    'testyearsubclass_id' => $testyearsubclass->id ,
                    'year_id' => $year_id ,
                    'the_class_id' => $subjectclass->the_class_id ,
                    'subject_id' => $subjectclass->subject_id ,
                    'subject_the_class_id' => $subjectclass->id ,
                    //to modify when fixing teatchers dashboard
                    'teatcher_id' => $testyearsubclass->teatcher_id ,
                    'student_id' => Auth::id() ,
                    'note' => 0,
                    'seen' => false,
                    'done_minutes' => "02:00"
                ]);

            $adate= date("Y/m/d H:i:s");
            $dateinsec=strtotime($adate);

            $duration= ( $test->time_minutes * 60 ) + 60;

            $newdate=$dateinsec+$duration;
            $date = date('Y/m/d H:i:s',$newdate);

            return view('back.tests.pass', compact('test', 'subjectclass', 'note', 'date'));

        }else{
            return 'You passed that test';
        }
    }

    public function getNote(Request $request, Test $test, Note $note){
        
        $student_answers = array_except($request->all(), ['_token','done_minutes']);
        $answers = json_decode($test->answers, true);
        $notes = json_decode($test->notes, true);
        //dd($student_answers , '------------', $answers , '------------', $notes );
        $final_note = 0;

        foreach ($notes as $value) {
            # code...
            if( $answers[ $value['name'] ] == $student_answers[ $value['name'] ]  ){

                $final_note += (double)$value['note'] ;

            }

        }
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

        if( $language == null ){

            $language = GetSetting::getConfig('test-language');
        }

        $class = TheClass::find($class_id);
        $subject = Subject::find($subject_id);
        return view('back.tests.add-linked',compact('subject', 'class','language'));
    }

    public function storeLinked(Request $request, $class_id,  $subject_id ){

        $test = Test::create(['body' => $request->body, 'title' => $request->title, 'notes' => $request->notes, 'time_minutes' => $request->time_minutes]);

        

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

                Testyearsubclass::create([
                    'year_id' => Session::get('yearId'),
                    'test_id' => $test->id,
                    'subject_the_class_id' => $subject_class->id,
                    'subject_id' => $subject_id,
                    'the_class_id' => $class_id,
                    'teatcher_id' => Auth::id(),
                    'publish' => $publish,
                    'navigation' => $navigation

                    ]);

                return redirect()->route('tests.get-answers', $test->id);

            }


        }

    }

    public function addLinkedLinking($class_id,  $subject_id){
        $class = TheClass::find($class_id);
        $subject = Subject::find($subject_id);
        $subject_class = Subjectclass::where('the_class_id', $class_id)->where('subject_id', $subject_id)->first();

        $tests = $subject_class->tests;

        $testsMines = $subject_class->tests->pluck('id')->toArray();
        $testsFull = Test::pluck('id')->toArray();
        $testsIds = array_diff($testsFull, $testsMines);

        $testsArray = Test::find($testsIds)->pluck('title', 'id')->toArray();

        return view('back.tests.add-linked-linking',compact('subject', 'class', 'testsArray', 'tests'));
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


        Testyearsubclass::create([
            'year_id' => Session::get('yearId'),
            'test_id' => $test->id,
            'subject_id' => $subject_id,
            'the_class_id' => $class_id,
            'subject_the_class_id' => $subject_class->id,
            'teatcher_id' => Auth::id(),
            'publish' => $publish,
            'navigation' => $navigation
        ]);
        return response()->json(['id' => $test->id, 'name' => $test->title ]);
    }

    public function getAnswers(Test $test){

        return view('back.tests.get-answers',compact('test'));
    }

    public function postAnswers(Request $request, Test $test){
        
        $rArray = $request->all();

        $questions = json_decode($test->body, true);

        $aJSON = [];

        foreach ($questions as $key => $question) {
            # code...
            $aJSON[ $question['name'] ] = $rArray[ $question['name'] ] ;
        }

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
