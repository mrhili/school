<?php

namespace App\Http\Controllers;

use App\History;
use Illuminate\Http\Request;

class HistoryController extends Controller
{


      public function loadData()
      {
          $histories = History::orderBy('created_at','DESC')->limit(2)->get();

          return view('back.histories.loaddata')->withHistories($histories);
      }

      public function loadDataAjax(Request $request)
      {
          $output = '';
          $id = $request->id;

          $histories = History::where('id','<',$id)->orderBy('created_at','DESC')->limit(2)->get();

          if(!$histories->isEmpty())
          {
              foreach($histories as $history)
              {

                $bgColor;

                if( $history->class == 'success' ){

                  $bgColor = 'bg-green';

                }elseif( $history->class == 'info' ){

                  $bgColor = 'bg-blue';

                }elseif( $history->class == 'danger' ){

                  $bgColor = 'bg-red';

                }

                $admin = \App\Helpers\Common\Relation::byModel($history->category->model, $history->id_link );

                $output .='<li>
          	        <i class="fa fa-'.$history->category->icon.' '.$bgColor.'"></i>
          	        <div class="timeline-item">
          	            <span class="time"><i class="fa fa-clock-o"></i> '.$history->created_at.'</span>
          	            <h3 class="timeline-header"><a href="#" class="text-'.$history->class.'"> '.$admin->name . ' ' . $admin->last_name.' </a> a éffectué un  '.$history->category->name.' </h3>
          	            <div class="timeline-body">
          	                 '.$history->info. '
          	                <hr />
          	                <p class="text-default">Commentaire enregistré:  '.$history->comment.' </p>
          	            </div>
          	            <div class="timeline-footer">
          	                <a class="btn btn-'.$history->class.'  btn-xs btn-modal">Voire la note privé</a>
          		            <div class="text-modal hidden">
          		                 '.$history->hidden_note.'
          		            </div>
          	            </div>
          	        </div>
          	    </li>';

                $output .= '<li id="remove-row">
                                <button id="btn-more" data-id="'.$history->id.'" class="btn btn-primary" > Load More </button>
                            </li>';

                echo $output;

                }

              }
          }





    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function master()
    {
        //
        $histories = History::orderBy('created_at', 'desc')->get();


        return view('back.histories.master', compact('histories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\History  $history
     * @return \Illuminate\Http\Response
     */
    public function show(History $history)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\History  $history
     * @return \Illuminate\Http\Response
     */
    public function edit(History $history)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\History  $history
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, History $history)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\History  $history
     * @return \Illuminate\Http\Response
     */
    public function destroy(History $history)
    {
        //
    }
}
