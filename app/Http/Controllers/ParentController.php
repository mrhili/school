<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ParentController extends Controller
{
    //
    public function all(){
    	$parents = User::where('role', 2)->get();
        return view('back.parents.all',compact('parents'));
    }

    
}
