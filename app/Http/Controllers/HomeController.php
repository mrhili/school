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
    Observation,
    Course,
    Etage,
    Roomtype,
    Objctype,
    Objct,
    Calling,
    Meetingtype,
    Meeting,
    Meetingpopulating
};
use Application;
use Auth;

use App;
use Session;
use ArrayHolder;

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

    public function myProfile(){
      $user = Auth::user();

      return redirect()->route(  ArrayHolder::roles_routing($user->role).'.my-profile');

    }

    public function profile(){
      $user = Auth::user();

      return redirect()->route(  ArrayHolder::roles_routing($user->role).'.profile');

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
        $courses = Course::all()->count();


        $roomtypes = Roomtype::count();
        $etages = Room::count();

        $objctypes = Objctype::count();
        $objcts = Objct::count();

        $observations = Observation::count();
        $callings = Calling::count();

        $meetingtypes = Meetingtype::count();
        $meetings = Meeting::count();

        $mymeetings= Meetingpopulating::where('invited_id', Auth::id() )->count();

        $meetingsCreatedbyme = Meetingpopulating::where('creator_id', Auth::id() )->count();




        return view('home', compact('students', 'parents', 'teatchers','secretarias','admins','masters', 'classes', 'subjects', 'tests','fournitures','rooms', 'roomtypes', 'etages', 'objctypes', 'objcts', 'observations', 'callings', 'meetingtypes', 'meetings', 'mymeetings', 'meetingsCreatedbyme', 'courses'));
    }

    public function monthsBD()
    {

        return response()->json( Application::fillBarMonthsBD() );
    }




    public function language(String $locale)
    {
        //App::setLocale($locale);
        Session::put('locale', $locale);
        return redirect()->back();
        /*
        $locale = in_array($locale, config('app.locales')) ? $locale : config('app.fallback_locale');
        session(['locale' => $locale]);
        return back();
        */
    }
    public function getLanguage()
    {
        App::getLocale();
    }
}
