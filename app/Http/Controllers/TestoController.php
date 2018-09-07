<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{
  User
};
use App\Parsers\StudFromMassar;
use App\Exports\UsersExport;
use Excel;
use Importer;
use PDF;
use DB;

class TestoController extends Controller
{





      public function importExport()
      {
          return view('testos.importExport');
      }
      public function downloadExcel($type)
      {
        return Excel::download(new UsersExport, 'users.xlsx');
      }
      public function importExcel(Request $request)
      {

        if($request->hasFile('import_file')){
            $filepath = $request->file('import_file')->getRealPath();
            $collection = Importer::make('Excel')
              ->load($filepath)

              ->setParser(new StudFromMassar)

              ->getCollection();

            dd( $collection );

        }else{
          return 'no file';
        }

        return 'success' ;

      }











  /********************************************/
    //
    public function printable(){
      $users = User::where('role', 1)->first();

      return view('back.testos.printable', compact('users'));

    }

    public function printableParent(){
      $users = User::where('role', 2)->first();

      return view('back.testos.printable_parent', compact('users'));

    }

    public function printableWorker(){
      $users = User::where('role', 6)->first();

      return view('back.testos.printable_worker', compact('users'));

    }
    public function printablesheetWorker(){

    	$pdf = PDF::loadView('back.testos.printable_worker');
		  return $pdf->download('worker.pdf');
/*
      $users = User::where('role', 6)->first();

      return view('back.testos.printable_worker', compact('users'));
*/
    }


}
