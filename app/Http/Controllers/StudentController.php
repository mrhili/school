<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Student;

use CommonPics;

use App\User;

use App\TheClass;

use Alert;

class StudentController extends Controller
{
    //
    public function add(){
    	$classes = TheClass::pluck('name', 'id');
    	$role = 1;
    	return view('back.users.add', compact('role', 'classes'));
    }

    public function store(Student $request){
    	$array = array_except( $request->toarray(), ['_token', 'password' ,'img']);

    	if( $request->hasFile( 'img' ) ){

    		$imgName = CommonPics::storeFile( $request->img , $dir = 'profils' );

    		$array["img"] = $imgName;

    	}

    	$array["password"] = bcrypt($request->password );

    	$student = User::create($array);

	    if ($student) {

	        alert()->success('L\'etudiant s\'est enregistrer !', 'Tres bien');
	        return redirect()->route('students.all');
	    }

    }

    public function all(){

    	return 'Student';

    }

}
