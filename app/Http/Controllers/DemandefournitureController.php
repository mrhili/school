<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{
  Demandefourniture,
  User,
  History,
  Fourniture,
  Fournituration,
  SubjectClass,
  TheClass,
  Subject
};
use Session;
use Auth;

class DemandefournitureController extends Controller
{
    public function accept(Request $request, Demandefourniture $demande){
      $demande->done = true;
      $demande->admin_id = Auth::id();
      $true = $demande->save();

      $fournituration = Fournituration::where('student_id', $demande->student_id)
                          ->where('year_id', $this->selected_year )
                          ->where('fourniture_id', $demande->fourniture->id )
                          ->where('the_class_id', $demande->student->the_class_id)
                          ->first();
      if($fournituration){

        $fournituration->exist = true;
        $fournituration->confirmed = true;
        $fournituration->save();

      }

      $demande->fourniture->got = $demande->fourniture->got - $demande->howmany;

      if( $true && $demande->fourniture->save() ){

        $creation = [

            'id_link' => $demande->id,
            'info' => 'just talk',
            'hidden_note' => $request->hidden_note,
            'by-admin' => Auth::id(),
            'comment' => $request->hidden_note,
            'category_history_id' => 30,
            'class' => 'success',
            ];

          $creation['info'] = 'Ladmin : <strong>'.Auth::user()->name .' '.

          Auth::user()->last_name .'</strong> a accepter la demande: <br />  '.$demande->howmany.' fourniture qui porte le nom <strong>'.
          $demande->fourniture->name.' </strong> la charge :' . $demande->totalmoney . ' </strong>.'  ;

          History::create( $creation );

          return response()->json(['id' => $demande->id, 'name' => $demande->fourniture->name, 'average_price' => $demande->fourniture->average_price, 'howmany' => $demande->howmany ,'totalmoney' => $demande->totalmoney ]);
      }else{
        return response()->json(null, 522);
      }

    }

    public function list(){
      $demandes = Demandefourniture::where('done', false )->orderBy('created_at','DESC')->limit(2)->get();

      return view('back.demandefournitures.list' , compact('demandes'));
    }

    public function loadDataAjax(Request $request)
    {
        $output = '';
        $id = $request->id;
        //$histories = History::where('id','<',$id)->orderBy('created_at','DESC')->limit(2)->get();
        $demandes = Demandefourniture::where('done', false)->orderBy('created_at','DESC')->limit(2)->get();

        if(!$demandes->isEmpty()){

          foreach($demandes as $demande)
          {


          }

        }
    }

}
