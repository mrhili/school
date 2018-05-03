<?php

namespace App\Http\Controllers;

use App\TheClass;
use Illuminate\Http\Request;

class TheClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        //
        $classes = TheClass::get();

        return view('back.classes.list', compact( 'classes' ) );
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
     * @param  \App\TheClass  $theClass
     * @return \Illuminate\Http\Response
     */
    public function show(TheClass $theClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TheClass  $theClass
     * @return \Illuminate\Http\Response
     */
    public function edit(TheClass $theClass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TheClass  $theClass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TheClass $theClass)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TheClass  $theClass
     * @return \Illuminate\Http\Response
     */
    public function destroy(TheClass $theClass)
    {
        //
    }
}
