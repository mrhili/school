<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{
	Observation,
	User
};

use Yajra\Datatables\Datatables;
use Session;
use Auth;
use ArrayHolder;
use Application;

class ObservationController extends Controller
{
    //
    public function write(){

    }

    public function writefor(User $user){

    	return view('back.observations.write-for', compact('user'));

    }

    public function postWritefor(Request $request){

    	$observation = Observation::create([
        'observer_id' => Auth::id(),
		'observed_id' => $request->observed_id,
		'title' => $request->title,
		'observation' => $request->observation,
		'type' => $request->type,
		'year_id' => Session::get('yearId')
    		]);
    	if( $observation ){
    		return 'success';
    	}else{
    		return 'faild';
    	}
    	
    	

    }

    public function myObs(){

    	return view('back.observations.my-obs');

    }

	public function dataMyObs(){

		$year = Session::get('yearId');

        return Datatables::of( Auth::user()->aboutme()

        	//->where('year_id' , $year )

            ->orderBy('created_at', 'desc')->get() )

        ->editColumn('ecrit_par', function( $model ){
        	return link_to_route('users.profile', $model->name.' '.$model->last_name, [ $model->id ], ['class' => 'btn btn-xs btn-info btn-circle']);

        })
        ->editColumn('titre', function( $model ){

            return $model->pivot->title;

        })
        ->editColumn('observation', function( $model ){

            return $model->pivot->observation;

        })
        ->editColumn('type', function( $model ){

            return ArrayHolder::observation_types( $model->pivot->type );

        })

        ->editColumn('report', function($model){



        	$array = Application::fillReportedButton( $model->pivot );

            return link_to('#', $array['icon'], ['class' => 'btn btn-xs btn-'. $array['class'] .' btn-circle btn-report', 'data-id' => $model->pivot->id, 'id' => 'report-'.$model->pivot->id ], null);
        })
        ->editColumn('delete', function($model){
            return link_to('#', 'Delete', ['class' => 'btn btn-xs btn-danger btn-circle btn-delete', 'data-id' => $model->id ], null);
        })
        ->rawColumns(['ecrit_par'])
        ->make(true);	

    }


    public function switchReported(Observation $o){


			$o->reported = !$o->reported;
	        $o->save();


	        $buttonArray = Application::fillReportedButton($o );

	        $icon = $buttonArray['icon'];
	        $class = $buttonArray['class'];
        	return response()->json(['swal'=> true,'message'=> 'success','icon' => $icon , 'class' => $class]) ;
    }

    

    public function deleteObs(Observation $o){

    		if( $o->seen ){
    			return wrapThings();

    			$o->delete();

    			return response()->json(['swal'=> true,'message'=> 'success']) ;

    		}else{

    			return response()->json(['swal'=> false,'message'=> 'Tu peut pas suprimer jusqua ton parent voit lobservation']) ;

    		}


    }



}
