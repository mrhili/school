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

use Auth;
use Session;
use Carbon;
use Relation;
class MeetingController extends Controller
{
    //


    public function list()
    {
        # code...
       
        $meetings = Meeting::all();

        $meetingtypes = Meetingtype::pluck('name', 'id')->toArray();

        return view('back.meetings.list', compact('meetings', 'meetingtypes'));
    }
    


    
   public function store(Request $request, Meetingtype $meetingtype)
    {


$array = [
	            'name' => $request->namefield,
	            'object' => $request->object,
	            'body' => $request->body,
	            'meetingtype_id' => $meetingtype->id,
	            'place' => $request->place
];

		$time = new Carbon( $request->time );
if(  $request->kindTimeEnd == 'number' ){
/*$adate= date("Y/m/d H:i:s");
            $dateinsec=strtotime($adate);

            $duration= ( $test->time_minutes * 60 ) + 60;

            $newdate=$dateinsec+$duration;
            $date = date('Y/m/d H:i:s',$newdate);*/

        $timeinsec = strtotime( $time );
        $duration = $request->time_end * 60 ;
        $exactTimeinsec = $timeinsec + $duration;
        $time_end = date('Y/m/d H:i:s', $exactTimeinsec );

}elseif( $request->kindTimeEnd == 'time' ){
	$time_end = new Carbon( $request->time_end );
}
$array['time'] = $time;
$array['end_time'] = $time_end;
        $meeting = Meeting::create($array);




        $admin = User::find( Auth::id() );

        $creation = [

            'id_link' => $meeting->id,
            'comment' => $request->comment, 
            //lhomme a payeé un montant 500 dh de pour letudiant qui est dans la class 6  sur le payement du mois 6 sur lanée 2017/2018 et ila remplie le charge parsquil avait rien sur ce mois et il falait quil pay 700dh 
            'info' => 'just talk',
            'hidden_note' => $request->hidden_note,
            'by-admin' => $admin->id,

            'category_history_id' => 12,
            'class' => 'success',
            //'id_link' => $request->id_link,

            ];
        $creation['info'] = 'Ladmin : <strong>'.$admin->name .' '. $admin->last_name .'</strong> a ajouté un meeting qui porte le nom <strong>'.$meeting->name.'  </strong> en type <strong>'. $meetingtype->name .'</strong> lobjet: <strong> '. $meeting->object .'</strong> .'  ;

        History::create( $creation );

        if( $meeting ){

            Relation::fillPopulateMeeting( $meeting->id );









            return response()->json(['id' => $meeting->id, 'name' => $meeting->name, 'object' => $meeting->object, 'body' => $meeting->body, 'meetingtype' => $meetingtype->name ]);
        }
        

        

        //return response()->json([ 'parameter' => $request->parameter ]);
    }




}
