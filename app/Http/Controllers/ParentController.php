<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class ParentController extends Controller
{
    //
    public function all(){
    	$parents = User::where('role', 2)->get();
        return view('back.parents.all',compact('parents'));
    }

    public function home(){

        $user = Auth::user();

        $childs = $user->relashionshipsStudentsParent;

        return view('back.parents.home',compact('childs'));
    }

    
}
