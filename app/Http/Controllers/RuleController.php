<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{
  Rule,
  RuleHolder
};
use Application;
use Relation;
use Auth;
use Yajra\Datatables\Datatables;
class RuleController extends Controller
{


  public function delete(Request $request, Rule $rule){

    $info = 'la loi <strong>'. $rule->rule .'</strong> a etait suprimer avec rejection a des prise de loi.';

    $rule->holders()->delete();


    Rule::find( $rule->id )->delete();


    return response()->json( Application::fillActiveButton( $rule ) );

  }

  public function switchActive(Request $request, Rule $rule){


    $rule->active = !$rule->active;

    $rule->save();

    return response()->json( Application::fillActiveButton( $rule ) );

  }

  public function postRuleHolder(Request $request){


    $ruleHolder = Application::storeRule( $request , true );


    $holderArray = $ruleHolder->toArray();

    $holderArray['rule'] = $ruleHolder->rule->rule;
    $holderArray['delete'] = 'delete';
    $holderArray['take'] = ($request->take? true: false);

    return response()->json($holderArray);

  }



    public function link(Request $request, Rule $rule){

      $ruleHolder = Relation::linkRule( $rule, Auth::user() );


      return response()->json([
        'id' => $ruleHolder->rule->id,
        'rule' => $ruleHolder->rule->rule
      ]);
    }

    public function myRules(){

      $ids = Ruleholder::where('user_id', Auth::id())->get(['rule_id'])->toArray();

      $others = Rule::whereNotIn( 'id', $ids)->get(['rule', 'id'])->pluck('rule', 'id')->toArray();

      return view('back.rules.my-rules', compact('others'));

    }


    public function dataMyRules(){


        return Datatables::of( Ruleholder::where('user_id', Auth::id()) )

            ->addColumn('rule', function( $model ){

                 return $model->rule->rule;

             })


           ->editColumn('delete', function( $model ){


             return link_to('#', 'Delete', ['class' => 'btn btn-danger' .' btn-circle btn-delete',  'data-id' => $model->id ,'id' => 'delete-' .$model->id ], null);


          })
          ->rawColumns(['delete'])

           ->make(true);


    }



    //

    public function post(Request $request){


      $rule = Application::storeRule( $request );

      return response()->json([
        'id' => $rule->id,
        'rule' => $rule->rule,
        'active' => $rule->active

      ]);



    }

    public function list(){

      $rulesArray = Rule::all()->toArray();

      return view('back.rules.list',compact('rulesArray'));

    }

    public function listData(){


        return Datatables::of( Rule::all() )


            ->editColumn('active', function( $model ){

              $exist = Application::fillActiveButton( $model );


              return link_to('#', $exist['icon'], ['class' => 'btn btn-'. $exist['class'] .' btn-circle btn-activate',  'data-id' => $model->id ,'id' => 'activate-' .$model->id ], null);


           })

           ->editColumn('delete', function( $model ){


             return link_to('#', 'Delete', ['class' => 'btn btn-danger' .' btn-circle btn-delete',  'data-id' => $model->id ,'id' => 'delete-' .$model->id ], null);


          })


           ->rawColumns(['active', 'delete'])


           ->make(true);


    }
}
