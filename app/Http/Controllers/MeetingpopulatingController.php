<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\{
	Meeting,
	Meetingtype,
    Meetingpopulating,
	User,
	History
};
use Yajra\Datatables\Datatables;
use Auth;
use Session;
use Carbon;
use Relation;
use Application;

class MeetingpopulatingController extends Controller
{
    //


/*
Route::get('/meeting-list-management', 'MeetingpopulatingController@managelist')
    Route::get('/meeting-management/{meetingpopulating}', 'MeetingpopulatingController@manage')
*/

    public function managelist()
    {
        //$meetings = Meetingpopulating::where('invited_id', Auth::id() )->get();
        $createdbyme = Meetingpopulating::where('creator_id', Auth::id() )->get();

        return view('back.meetings.managelist', compact('createdbyme'));

    }

    public function manage(Meetingpopulating $meetingpopulating){

        return view('back.meetings.manage', compact('meetingpopulating'));

    }

    public function dataManage(Meetingpopulating $meetingpopulating){

        return Datatables::of( Meetingpopulating::where('creator_id', Auth::id() )->get() )

        ->editColumn('name', function($model){
            return $model->meeting->name;
            //return link_to('#', 'Delete', ['class' => 'btn btn-xs btn-danger btn-circle btn-delete', 'data-id' => $model->id ], null);
        })
        ->editColumn('invited', function($model){

            $invited = $model->invitation_for;
            return $invited->name.' '.$invited->last_name;
            //return link_to('#', 'Delete', ['class' => 'btn btn-xs btn-danger btn-circle btn-delete', 'data-id' => $model->id ], null);
        })
        ->editColumn('note', function($model){
            return link_to('#', 'Voir les notes' , ['class' => 'btn btn-xs btn-info btn-circle btn-note', 'data-toggle'=>'modal', 'data-target'=>'#modal-default', 'data-id' => $model->id ], null);
        })
        ->editColumn('presence', function($model){
            //return $model->meeting->name;
            $array = Application::fillPresentButton( $model );

            $icon = $array['icon'];
            $class = $array['class'];

            return link_to('#', $icon, ['class' => 'btn btn-'. $class .' btn-circle btn-present', 'data-id' => $model->id, 'id' => 'present-'.$model->id ], null);
        })

        ->rawColumns([])
        ->make(true);   

    }

        public function switchPresent( Meetingpopulating $m){


            $m->present = !$m->present;
            $m->save();


            $buttonArray = Application::fillPresentButton( $m );

            $icon = $buttonArray['icon'];
            $class = $buttonArray['class'];

            return response()->json(['swal'=> true, 'message'=> 'success','icon' => $icon , 'class' => $class]) ;



    }


    public function mine()
    {
        //$meetings = Meetingpopulating::where('invited_id', Auth::id() )->get();

        return view('back.meetings.mine');

    }

    public function dataMine(){

    	return Datatables::of( Meetingpopulating::where('invited_id', Auth::id() )->get() )

        ->editColumn('name', function($model){
        	return $model->meeting->name;
            //return link_to('#', 'Delete', ['class' => 'btn btn-xs btn-danger btn-circle btn-delete', 'data-id' => $model->id ], null);
        })
        ->editColumn('object', function($model){
        	return $model->meeting->object;
            //return link_to('#', 'Delete', ['class' => 'btn btn-xs btn-danger btn-circle btn-delete', 'data-id' => $model->id ], null);
        })
        ->editColumn('body', function($model){
        	return $model->meeting->body;
            //return link_to('#', 'Delete', ['class' => 'btn btn-xs btn-danger btn-circle btn-delete', 'data-id' => $model->id ], null);
        })
        ->editColumn('time', function($model){
        	return $model->meeting->time;
            //return link_to('#', 'Delete', ['class' => 'btn btn-xs btn-danger btn-circle btn-delete', 'data-id' => $model->id ], null);
        })
        ->editColumn('end_time', function($model){
        	return $model->meeting->end_time;
            //return link_to('#', 'Delete', ['class' => 'btn btn-xs btn-danger btn-circle btn-delete', 'data-id' => $model->id ], null);
        })
        ->editColumn('place', function($model){
        	return $model->meeting->place;
            //return link_to('#', 'Delete', ['class' => 'btn btn-xs btn-danger btn-circle btn-delete', 'data-id' => $model->id ], null);
        })

        ->editColumn('invitation_par', function($model){

        	$created_by = $model->created_by;
        	return $created_by->name.' '.$created_by->last_name;
            //return link_to('#', 'Delete', ['class' => 'btn btn-xs btn-danger btn-circle btn-delete', 'data-id' => $model->id ], null);
        })

        ->editColumn('note', function($model){
            return link_to('#', 'Voir les notes' , ['class' => 'btn btn-xs btn-info btn-circle btn-note', 'data-toggle'=>'modal', 'data-target'=>'#modal-default', 'data-id' => $model->id ], null);
        })
        ->editColumn('presence', function($model){
        	//return $model->meeting->name;
        	$array = Application::fillPresentButton( $model );

            return link_to('#', $array['icon'] , ['class' => 'btn btn-xs btn-'. $array['class'] .' btn-circle' ], null);
        })
        ->rawColumns(['presence'])
        ->make(true);	


    }

    public function see( Request $request, Meetingpopulating $meetingpopulating ){

    	return response()->json(['id' => $meetingpopulating->id, 'note' => $meetingpopulating->note ]);

    }

    public function modify( Request $request, Meetingpopulating $meetingpopulating  ){

    	$meetingpopulating->note = $request->note;
    	
    	$meetingpopulating->save();

    	return response()->json(['id' => $meetingpopulating->id, 'note' => $meetingpopulating->note ]);
    	
    }



}
