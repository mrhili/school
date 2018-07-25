<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{
  User
};

use PDF;
class TestoController extends Controller
{
    //
    public function printable(){
      $users = User::where('role', 1)->first();

      return view('back.testos.printable', compact('users'));

    }

    public function printableParent(){
      $users = User::where('role', 2)->first();

      return view('back.testos.printable_parent', compact('users'));

    }

    public function printableWorker(){
      $users = User::where('role', 6)->first();

      return view('back.testos.printable_worker', compact('users'));

    }
    public function printablesheetWorker(){

    	$pdf = PDF::loadView('back.testos.printable_worker');
		  return $pdf->download('worker.pdf');
/*
      $users = User::where('role', 6)->first();

      return view('back.testos.printable_worker', compact('users'));
*/
    }


}
