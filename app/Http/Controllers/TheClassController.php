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

}
