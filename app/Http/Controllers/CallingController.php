<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{
    User,
    Year,
    History,
    Calling
};

use Session;

use Auth;

use Carbon;

use Application;

use Form;



use Yajra\Datatables\Datatables;
class CallingController extends Controller
{
    //



    public function new($parent = null){

    	$parents = User::where('role', 2)->pluck('name', 'id')->toArray();

    	$years = Session::get('yearId');

    	return view('back.callings.new' ,compact('parents', 'years', 'parent'));
    }

    public function storeNew(Request $request, $parent = null){



    	$parent_id;


    	if( $parent === null  ){
    		$parent_id = $request->parent;
    	}else{
    		$parent_id = $parent;
    	}

    	$time1 = new Carbon( $request->date1 );
    	$time2 = new Carbon( $request->date2 );
    	$time3 = new Carbon( $request->date3 );

        if( $request->required ){

            $required = true;

        }else{
            $required = false;
        }

        $calling = Calling::create([
        			'required' => $required,
		        	'caller_id' => Auth::id(),
		        	'parent_id' => $parent_id,
		        	'object' => $request->object,
		        	'time1' => $time1,
		        	'time2' => $time2,
		        	'time3' => $time3,
		        	'year_id' => Session::get('yearId')
        	]);

        if( $calling ){
        	redirect()->route('callings.all');
        }


    }


    public function all(){

    	$callings = Calling::all();

    	return view('back.callings.all', compact('callings'));

    }

    public function dataAll(){


        return Datatables::of( Calling::where('year_id' , Session::get('yearId') )

            ->orderBy('created_at', 'desc')->get() )
		->editColumn('required', function( $model ){

            if( $model->required ){
            	return link_to('#', 'Important', ['class' => 'btn btn-danger btn-circle', 'data-id' => $model->id ], null);

            }else{

            	return link_to('#', 'Pad important', ['class' => 'btn btn-info btn-circle', 'data-id' => $model->id ], null);

            };

        })


        ->editColumn('caller', function( $model ){

            return $model->caller->name.' '. $model->caller->last_name;

        })

        ->editColumn('called', function( $model ){

            return $model->called->name.' '. $model->called->last_name;

        })
        ->editColumn('times', function( $model ){

            return '<ul><li>'.$model->time1.'</li><li>'.$model->time2.'</li><li>'.$model->time3.'</li></ul>';

        })

        ->editColumn('vue', function( $model ){

            //fill

            if( $model->vue ){

            	return link_to('#', 'lapelle a etait vue avec success', ['class' => 'btn btn-danger btn-success', 'data-id' => $model->id ], null);

            }else{

            	return link_to('#', 'lapelle etait pas vue encore', ['class' => 'btn btn-danger btn-info', 'data-id' => $model->id ], null);

            };

        })
        ->editColumn('choosen_time', function( $model ){

        	if( $model->timeChoosenComming === null ){

        		return 'pas encore choisie';

        	}else{
	        	$array = [$model->time1, $model->time2, $model->time3 ];

	            return $array[ $model->timeChoosenComming ];
        	}



        })
        ->editColumn('other_choosen_time', function( $model ){

            // time

            if( $model->otherTimeComming === null ){

              return 'pas encore choisie';

            }else{
              return $model->otherTimeComming;

            }

        })

        ->editColumn('refused', function( $model ){

            // time

            if( !$model->vue && !$model->refused ){

              return 'Pas encore refusé';

            }else{

              return 'Refusé';


            }

        })

        ->editColumn('disagrement', function( $model ){

            // time

            if( !$model->vue && !$model->refused ){

              return '';

            }else{

              return 'Rien ecrit';


            }

        })

        ->editColumn('terminated', function( $model ){

            // fill button
        	$returnedArray = Application::fillTerminatedButtonCalling( $model );

            $icon = $returnedArray['icon'];
            $class = $returnedArray['class'];



            return link_to('#', $icon, ['class' => 'btn btn-'. $class .' btn-circle btn-terminated', 'data-id' => $model->id, 'id' => 'terminated-'.$model->id ], null);

        })
        ->editColumn('result', function( $model ){

            return Form::text('result', $model->result, ['class' => 'form-control text-result', 'data-id' => $model->id, 'id' => 'result-'.$model->id]);


        })
        ->editColumn('action', function( $model ){

            // edit button
			if( !$model->vue ){

            	return '<a href="'. route('callings.edit', $model->id ).'" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> edit</a> <a href="#" data-id="'. $model->id .'"  id="delete-'. $model->id .'" class="btn btn-warning btn-xs btn-delete"><i class="fa fa-trash"></i> suprimer</a>';

            }else{

            	return '<a href="#" class="btn btn-danger">Tu ne peut ni editer ni suprimer cet apelle</a>';

            }




        })


        ->rawColumns(['vue', 'terminated', 'action','times'])
        ->make(true);

    }

    public function myCalls(){

    	$callings = Calling::all();

    	return view('back.callings.myCalls', compact('callings'));

    }

//writeResultCalling

public function writeResultCalling(Request $request, Calling $c){


  $c->result = $request->result;
  $c->save();

  return response()->json(['swal'=> true,'message'=> 'success','text' => $c->result ]) ;

}

    public function switchTerminatedCalling(Calling $c){


			$c->terminated = !$c->terminated;
	        $c->save();


	        $buttonArray = Application::fillTerminatedButtonCalling($c );

	        $icon = $buttonArray['icon'];
	        $class = $buttonArray['class'];

        	return response()->json(['swal'=> true,'message'=> 'success','icon' => $icon , 'class' => $class]) ;




    }
    //editCalling
    public function editCalling(Calling $calling){

      if( !$calling->vue ){

      	$parents = User::where('role_id', 2)->pluck('id', 'last_name');

        return view('back.callings.edit', compact('calling', 'parents'));

      }else {
        # code...
        return 'Tu peut pas editer cet apelle parceque il est deja vue';
      }

    }

    public function updateCalling(Calling $c){

    	$time1 = new Carbon( $request->date1 );
    	$time2 = new Carbon( $request->date2 );
    	$time3 = new Carbon( $request->date3 );

        if( $request->required ){

            $required = true;

        }else{
            $required = false;
        }

        $calling = Calling::create([
        			'required' => $required,
		        	'caller_id' => Auth::id(),
		        	'parent_id' => $request->parent,
		        	'object' => $request->object,
		        	'time1' => $time1,
		        	'time2' => $time2,
		        	'time3' => $time3,
		        	'year_id' => Session::get('yearId')
        	]);

        if( $calling ){
        	redirect()->route('callings.all');
        }




    }

    public function deleteCalling(Calling $calling){

      if( !$calling->vue ){
        $calling->delete();
        return response()->json(['swal'=> true,'success'=> true,'message'=> 'success']) ;
      }else{
        return response()->json(['swal'=> true,'success'=> false,'message'=> 'lapelle est deja vue']) ;
      }

    }

}
