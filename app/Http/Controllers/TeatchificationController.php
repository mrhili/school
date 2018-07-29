<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\{
  User,
  Teatchification,
  The_class,
  Subject,
  Subjectclass,
  History
};

use Session;

class TeatchificationController extends Controller
{

  public function link()
  {
    // code...
    $teatchifications = Teatchification::all();

    $teatchifications = Teatchification::all();

    $deselect =  Teatchification::pluck('subject_the_class_id')->toArray();

    $selection = Subjectclass::whereNotIn('id', $deselect)->get()->toArray();

    $teatchers = User::where('role', 3)->pluck('name', 'id')->toArray();

    return view('back.teatchifications.link',compact('teatchifications', 'selection', 'teatchers'));
  }

}
