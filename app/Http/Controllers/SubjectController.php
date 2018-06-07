<?php

namespace App\Http\Controllers;

use App\{
        History,
        User,
        Subject,
        TheClass
};
use Illuminate\Http\Request;
use Auth;

use Session;

class SubjectController extends Controller
{



    public function byClass($class){

        $class = TheClass::find($class);

        $subjects = $class->subjects;

        $subjectsMines = $class->subjects->pluck('id')->toArray();

        $subjectsArrayFull = Subject::pluck('id')->toArray();

        $subjectsArrayIds = array_diff( $subjectsArrayFull, $subjectsMines );

        $subjectsArray = Subject::find($subjectsArrayIds)->pluck('name', 'id')->toArray();

        return view('back.subjects.byClass', compact('class', 'subjects', 'subjectsArray'));

    }

    public function linkClass(Request $request,$class, $subject_id){

        $the_class = TheClass::find( $class );

        $subject = Subject::find( $subject_id );

        $pivot = $the_class->subjects()->attach( $subject_id, ['parameter' => $request->parameter ]);

        $admin = User::find( Auth::id() );

        $creation = [

            'id_link' => $subject->id,
            'comment' => $request->comment, 
            //lhomme a payeé un montant 500 dh de pour letudiant qui est dans la class 6  sur le payement du mois 6 sur lanée 2017/2018 et ila remplie le charge parsquil avait rien sur ce mois et il falait quil pay 700dh 
            'info' => 'just talk',
            'hidden_note' => $request->hidden_note,
            'by-admin' => $admin->id,

            'category_history_id' => 13,
            'class' => 'success',
            //'id_link' => $request->id_link,

            ];

        $creation['info'] = 'Ladmin : <strong>'.$admin->name .' '. $admin->last_name .'</strong> a ajouté une matier qui porte le nom <strong>'.$subject->name.' </strong> au class qui porte le nom' . $the_class->name . ' </strong>.'  ;

        History::create( $creation );



        if( $subject ){
            return response()->json(['id' => $subject->id, 'name' => $subject->name, 'parameter' => $request->parameter ]);
        }

    }

    public function list(){

        $subjects = Subject::all();

        $subjectsArray = Subject::pluck('name', 'id')->toArray();

        return view('back.subjects.list', compact('subjects', 'subjectsArray'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $subject = Subject::create(  ['name' => $request->name] );


        $admin = User::find( Auth::id() );

        $creation = [

            'id_link' => $subject->id,
            'comment' => $request->comment, 
            //lhomme a payeé un montant 500 dh de pour letudiant qui est dans la class 6  sur le payement du mois 6 sur lanée 2017/2018 et ila remplie le charge parsquil avait rien sur ce mois et il falait quil pay 700dh 
            'info' => 'just talk',
            'hidden_note' => $request->hidden_note,
            'by-admin' => $admin->id,

            'category_history_id' => 12,
            'class' => 'success',
            //'id_link' => $request->id_link,

            ];

        $creation['info'] = 'Ladmin : <strong>'.$admin->name .' '. $admin->last_name .'</strong> a ajouté une matier qui porte le nom <strong>'.$request->name.' </strong> .'  ;

        History::create( $creation );



        if( $subject ){
            return response()->json(['id' => $subject->id, 'name' => $subject->name ]);
        }
        

        

        //return response()->json([ 'parameter' => $request->parameter ]);
    } 

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }




    /**
     * Display the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        //
    }
}
