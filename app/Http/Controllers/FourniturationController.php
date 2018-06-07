<?php

namespace App\Http\Controllers;

use App\{
    Founiture,
    Fournituration,
    TheClass,
    User,
    Year,
    History
};

use Illuminate\Http\Request;

use Session;

use Auth;

use Application;

use Yajra\Datatables\Datatables;

class FourniturationController extends Controller
{
    //
/*check*/

    public function dataCheck( TheClass $class )
    {
        $year = Session::get('yearId');
        /*
            { data: 'name', name: '' },
            { data: 'exist', name: '' },
            { data: 'confirmed', name: '' },
            { data: 'rejected', name: '' }
        */
        return Datatables::of( 
                Fournituration::where('year_id' , $year )->where('the_class_id' , $class->id )->get()
            )
        ->editColumn('name', function( $model ){

            return $model->student->name . ' ' . $model->student->last_name;

        })
        ->editColumn('exist', function( $model ) use( $year ){

            $buttonArray = Application::fillExistButton($model );

            $icon = $buttonArray['icon'];
            $class = $buttonArray['class'];

            return link_to('#', $icon, ['class' => 'btn btn-'. $class .' btn-circle btn-exist', 'data-id' => $model->id, 'id' => 'exist-'.$model->id ], null);

        })
        ->editColumn('confirmed', function( $model ) use( $year ){

            $buttonArray = Application::fillConfirmedButton($model );

            $icon = $buttonArray['icon'];
            $class = $buttonArray['class'];

            return link_to('#', $icon, ['class' => 'btn btn-'. $class .' btn-circle btn-confirmed', 'data-id' => $model->id, 'id' => 'confirmed-'.$model->id ], null);

        })
        ->editColumn('rejected', function( $model ) use( $year ){

            $buttonArray = Application::fillRejectedButton($model );

            $icon = $buttonArray['icon'];
            $class = $buttonArray['class'];

            return link_to('#', $icon, ['class' => 'btn btn-'. $class .' btn-circle btn-rejected', 'data-id' => $model->id, 'id' => 'rejected-'.$model->id ], null);

        })
        ->rawColumns(['exist', 'confirmed', 'rejected'])

        ->make(true);

    }

    public function childFournitures( $child )
    {
        //
        return view('back.fournitures.child-fournitures', compact('child'));
    }

    public function dataChildFournitures(  $child )
    {
        //
        $year = Session::get('yearId');

return Datatables::of( Fournituration::where('student_id' , Auth::id() )->where('year_id' , $year )

        ->orderBy('created_at', 'desc')->get() )

        ->editColumn('name', function( $model ){

            return $model->fourniture->name;

        })
        ->editColumn('additional_info', function( $model ){

            return $model->fourniture->additional_info;

        })
        ->editColumn('for', function( $model ){

            return $model->fourniture->for;

        })
        ->editColumn('required', function( $model ){

            if($model->fourniture->required){
                return 'Important(e)';
            }else{
                return 'Nest pas important(e)';
            }
        })
        ->editColumn('exist', function( $model ) use( $year ){

            $buttonArray = Application::fillExistButton($model );

            $icon = $buttonArray['icon'];
            $class = $buttonArray['class'];

            return link_to('#', $icon, ['class' => 'btn btn-'. $class .' btn-circle btn-exist', 'data-id' => $model->id, 'data-month' => 13, 'id' => 'exist-'.$model->id ], null);

        })
        ->editColumn('statu', function( $model ){

            $buttonArray = Application::fillExistButton($model );

            return $buttonArray['statu'];

        })
        ->rawColumns(['exist', 'statu'])

        ->make(true);
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function myFournitures()
    {
        //
        return view('back.fournitures.my-fournitures');
    }

    public function dataMyFournitures()
    {
        //
        $year = Session::get('yearId');

        return Datatables::of( Fournituration::where('student_id' , Auth::id() )->where('year_id' , $year )

        ->orderBy('created_at', 'desc')->get() )

        ->editColumn('name', function( $model ){

            return $model->fourniture->name;

        })
        ->editColumn('additional_info', function( $model ){

            return $model->fourniture->additional_info;

        })
        ->editColumn('for', function( $model ){

            return $model->fourniture->for;

        })
        ->editColumn('required', function( $model ){

            if($model->fourniture->required){
            	return 'Important(e)';
            }else{
            	return 'Nest pas important(e)';
            }
        })
        ->editColumn('exist', function( $model ) use( $year ){

            $buttonArray = Application::fillExistButton($model );

            $icon = $buttonArray['icon'];
            $class = $buttonArray['class'];

            return link_to('#', $icon, ['class' => 'btn btn-'. $class .' btn-circle btn-exist', 'data-id' => $model->id, 'data-month' => 13, 'id' => 'exist-'.$model->id ], null);

        })
        ->editColumn('statu', function( $model ){

            $buttonArray = Application::fillExistButton($model );

            return $buttonArray['statu'];

        })
        ->rawColumns(['exist', 'statu'])

        ->make(true);
    }
    public function switchExist(Fournituration $f){


        $f->exist = !$f->exist;
        $f->save();

            $buttonArray = Application::fillExistButton($f );

            $icon = $buttonArray['icon'];
            $class = $buttonArray['class'];
            $statu = $buttonArray['statu'];


        return response()->json(['exist' => $f->exist, 'icon' => $icon , 'class' => $class, 'statu' => $statu]) ;

    }

    public function switchConfirmed(Fournituration $f){

        $f->confirmed = !$f->confirmed;
        $f->save();

        if(($f->confirmed && $f->rejected) || (!$f->confirmed && !$f->rejected)){

            $f->rejected = !$f->rejected;
            $f->save();

        }

            $buttonArray = Application::fillConfirmedButton($f );

            $icon = $buttonArray['icon'];
            $class = $buttonArray['class'];
        return response()->json(['exist' => $f->confirmed, 'icon' => $icon , 'class' => $class]) ;

    }

    public function switchRejected(Fournituration $f){

        $f->rejected = !$f->rejected;
        $f->save();

        if(($f->confirmed && $f->rejected) || (!$f->confirmed && !$f->rejected) ){

            $f->confirmed = !$f->confirmed;
            $f->save();

        }

            $buttonArray = Application::fillRejectedButton($f );

            $icon = $buttonArray['icon'];
            $class = $buttonArray['class'];
        return response()->json(['exist' => $f->rejected, 'icon' => $icon , 'class' => $class]) ;

    }


}
