<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{
    User,
    TheClass,
    Subject,
    StudentsPayment,
    Test,
    Fourniture,
    Room,
    Objct,
    Observation,
    Course,
    Etage,
    Roomtype
};
use Application;
use Auth;

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

        }else if( $user->role == 2 ){

            return redirect()->route('parents.home');

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
        $fournitures = Fourniture::count();
        $rooms = Room::count();
        
        $roomtypes = Roomtype::count();
        $etages = Etage::count();



        //$monthsBD =  Application::fillBarMonthsBD() ;

        return view('home', compact('students', 'parents', 'teatchers','secretarias','admins','masters', 'classes', 'subjects', 'tests','fournitures','rooms', 'roomtypes', 'etages' ));
    }

    public function monthsBD()
    {

        return response()->json( Application::fillBarMonthsBD() );
    }
}
