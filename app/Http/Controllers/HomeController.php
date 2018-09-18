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
    Meetingpopulating,
    Demandefourniture,
    Courseyearsubclass,
    Testyearsubclass
};
use Application;
use Auth;

use RealRashid\SweetAlert\Facades\Alert;

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

    public function docs($selected = null){
      $user = Auth::user();

      return redirect()->route(  ArrayHolder::roles_routing($user->role).'.docs', $selected );

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



        if( $user->role != 6 ){

            Alert::html('<i>Bienvenue</i>',"
                <b>Tu peut voire le documentaire</b> <a class='btn btn-success' href='". route(ArrayHolder::roles_routing($user->role).'.docs') ."'>ICI</a></b>.",
                'success')->autoClose(500000);


            return redirect()->route(  ArrayHolder::roles_routing($user->role).'.home');
        }

        $year = Session::get('yearId');
        $users = User::where('role', 0 )->count();
        $students = User::where('role', 1 )->where('fill_payment', true )->count();
        $studentsNonValidate = User::where('role', 1 )->where('fill_payment', false )->count();
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

        $demandefournitures = Demandefourniture::count();

        $courses2Validate = Courseyearsubclass::where('publish', false)
          ->where('year_id', $year)
          ->take(10)
          ->get();

          $tests2Validate = Testyearsubclass::where('publish', false)
            ->where('year_id', $year)
            //->orderBy('end', 'asc')
            ->take(10)
            ->get();

        return view('home', compact('users','students', 'parents',
         'teatchers','secretarias','admins',
        'masters', 'classes', 'subjects', 'tests',
        'fournitures','rooms', 'roomtypes',
         'etages', 'objctypes', 'objcts',
         'observations',
          'callings', 'meetingtypes',
          'meetings', 'mymeetings', 'meetingsCreatedbyme',
           'courses', 'demandefournitures',
           'courses2Validate',
           'tests2Validate',
           'studentsNonValidate'));
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
