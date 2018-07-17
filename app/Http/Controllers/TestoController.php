<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{
  User
};
class TestoController extends Controller
{
    //
    public function printable(){
      $users = User::where('role', 1)->first();

      return view('back.testos.printable', compact('users'));

    }
}
