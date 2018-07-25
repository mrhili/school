<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use PDF;
use Session;
use App\{
  User,
  StudentsPayment,
  Relashionship,
  Userspayment
};
class PrintableController extends Controller
{
    //
    public function printableSheeNewStudentWithParent(User $student, User $parent){

      $student_info = StudentsPayment::where('user_id', $student->id)
      ->where('year_id', Session::get('yearId') )
      ->where('the_class_id', $student->the_class->id )
      ->where('month_id', 9 )
        ->first();

      $student_info_once_payment_array = [];

      $student_info_once_payment_array['saving_model'] = StudentsPayment::where('user_id', $student->id)
      ->where('year_id', Session::get('yearId') )
      ->where('the_class_id', $student->the_class->id )
      ->where('month_id', 13 )
      ->first();

      $student_info_once_payment_array['assurence_model'] = StudentsPayment::where('user_id', $student->id)
      ->where('year_id', Session::get('yearId') )
      ->where('the_class_id', $student->the_class->id )
      ->where('month_id', 14 )
      ->first();

        $student_info_once_payment_array['trans_assurence_model'] = StudentsPayment::where('user_id', $student->id)
        ->where('year_id', Session::get('yearId') )
        ->where('the_class_id', $student->the_class->id )
        ->where('month_id', 15 )
        ->first();

      $relation = Relashionship::where('student_id', $student->id)->where('student_id', $student->id)->first();

      //dd( $student_info );

      return view('back.printables.new-student-with-parent', compact( 'student', 'parent', 'student_info', 'student_info_once_payment_array', 'relation' ));

    }


    public function printableSheeNewWorker(User $worker){
      //
      $worker_info = Userspayment::where('user_id', $worker->id)
      ->where('year_id', Session::get('yearId') )
      ->where('month_id', 9 )
        ->first();

      return view('back.printables.new-worker', compact( 'worker', 'worker_info' ));

    }





}
