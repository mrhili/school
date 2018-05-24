<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\TheClass;
use App\Subject;
use App\StudentsPayment;
use App\Test;
use Application;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = Auth::user();

        if( $user->role == 1 ){

            return redirect()->route('students.home');

        }

        $students = User::where('role', 1 )->count();
        $parents = User::where('role', 2 )->count();
        $teatchers = User::where('role', 3 )->count();
        $secretarias = User::where('role', 4 )->count();
        $admins = User::where('role', 5 )->count();
        $masters = User::where('role', 6 )->count();
        $classes = TheClass::count();
        $subjects = Subject::count();
        $tests = Test::count();

        Alert::alert('Title', 'Message', 'Type');



        //$monthsBD =  Application::fillBarMonthsBD() ;

        return view('home', compact('students', 'parents', 'teatchers','secretarias','admins','masters', 'classes', 'subjects', 'tests', '' ));
    }

    public function monthsBD()
    {

        return response()->json( Application::fillBarMonthsBD() );
    }
}
