<?php

namespace App\Http\Controllers;

use App\{
    Note,
    Subjectclass
};
use Illuminate\Http\Request;
use Auth;
use Yajra\Datatables\Datatables;
use Session;

class NoteController extends Controller
{



    public function childNotes(User $child)
    {
        //
        return view('back.notes.child-notes', compact('child'));
    }

    public function dataChildNotes(User $child)
    {
        //
        $year = Session::get('yearId');

        return Datatables::of( Note::where('student_id' , $child->id )->where('year_id' , $year )
            //->orderBy('created_at', 'desc')
            ->orderBy('created_at', 'desc')->get() )

        ->editColumn('test_title', function( $model ){

            return $model->testyearsubclass->test->title;

        })
        ->editColumn('subject', function( $model ){

            return $model->subject->name;

        })
        ->make(true);
    }






    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function myNotes()
    {
        //
        return view('back.notes.my-notes');
    }

    public function dataMyNotes()
    {
        //
        $year = Session::get('yearId');

        return Datatables::of( Note::where('student_id' , Auth::id() )->where('year_id' , $year )
            //->orderBy('created_at', 'desc')
            ->orderBy('created_at', 'desc')->get() )

        ->editColumn('test_title', function( $model ){

            return $model->testyearsubclass->test->title;

        })
        ->editColumn('subject', function( $model ){

            return $model->subject->name;

        })
        ->make(true);
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Note $note)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        //
    }
}
