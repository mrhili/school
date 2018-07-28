<?Php

namespace App\Helpers\Common;
use File;

use App\Helpers\Config\Setting;

use App\{
    Year,
    Month,
    User,
    StudentsPayment,
    Userspayment,
    History,
    HistoryCategory,
    Fournituration,
    Fourniture,
    TheClass,
    Meetingtype,
    Meeting,
    Meetingpopulating,
    PivotCoursub

};

use Session;
use Carbon;
use Auth;
//TODO
/*
Add the Transport field to students
Add the Year life cycle

*/



class Pics {

    public static function storeFile( $file = '', $dir = '' ){

        $imgName = $file->getClientOriginalName();

        $imgAndTime = time() . '_' . $imgName ;

        $file->move( base_path().'/public/images/'. $dir .'/', $imgAndTime );

        return $imgAndTime;

    }

    public static function storeCompareFile($slug = '', $dir = '', $file = '' ,$request){

    	$imgName = $request->file( $slug )->getClientOriginalName();


	        if( file_exists( base_path().'/public/images/'. $dir .'/'.$file ) ){

	            File::delete( base_path().'/public/images/'. $dir .'/' . $file );

	        }

        $imgAndTime = time() . '_' . $imgName ;

        $request->file( $slug )->move( base_path().'/public/images/'. $dir .'/', $imgAndTime );

	    return $imgAndTime;

    }

    public static function ifImg($place, $varImg ){

        if( $varImg == '' || $varImg == null || !file_exists( base_path().'/public/images/'. $place .'/'.$varImg )  ){

            return asset('/images/config/'. Setting::getConfig( 'no-image' ) );

        }else{

            return asset('/images/'.$place.'/'. $varImg );

        }

    }

}

class FormFields {

    public static function initVar($arr = [], $item = ''){

		if( isset( $arr[$item] ) ){

		    if( array_key_exists ( $item , $arr ) ){

		        return $arr[ $item ];

			}else{

				return old( $item );

			}

		}else{

			return old( $item );

		}

    }


}

class Holder {

    public static function teaserTypes( $item = null ){

        $teaserTypes = [
            'Teaser text',
            'Teaser video'
        ];

        if( $item === null){
            return $teaserTypes;
        }else{
            return $teaserTypes[$item];
        }

    }




    public static function gender( $item = null ){

        $genderTypes = [
            'Feminin',
            'Masculin'
        ];

        if( $item === null){
            return $genderTypes;
        }else{
            return $genderTypes[$item];
        }

    }



    public static function months( $item = null ){

        $months = [
            'Janvier',
            'Fevrier',
            'Mars',
            'Avril',
            'Mai',
            'Juin',
            'Juillet',
            'Out',
            'Septembre',
            'Octobre',
            'Novembre',
            'Décembre'
        ];

        if( $item === null){
            return $months;
        }else{
            return $months[$item];
        }

    }

    public static function roles_routing( $item = null ){

        $rolesTypes = [
            'users',
            'students',
            'parents',
            'teatchers',
            'secretarias',
            'admins',
            'masters'
        ];

        if( $item === null){
            return $rolesTypes;
        }else{
            return $rolesTypes[$item];
        }

    }

    public static function roles( $item = null ){

        $rolesTypes = [
            'User',
            'Eléve',
            'Parent',
            'Maitre',
            'Secraitaire',
            'Administrateur',
            'Master'
        ];

        if( $item === null){
            return $rolesTypes;
        }else{
            return $rolesTypes[$item];
        }

    }

    public static function paymentMethods( $item = null ){

        $paymentMethods = [
            'Cash',
            'Check',
            'Par Compte Banquaire',
            'Cart de credit'
        ];

        if( $item === null){
            return $paymentMethods;
        }else{
            return $paymentMethods[$item];
        }
    }

    public static function backgroundColors( ){

        $backgrounds = [
            'primary',
            'info',
            'success',
            'warning',
            'danger',
            'gray',
            'navy',
            'teal',
            'purple',
            'orange',
            'maroon',
            'black'
        ];


        return $backgrounds[array_rand($backgrounds)];

    }

    public static function states( $item = null ){

        $states = [
            'Toute neuf',
            'Trés bonne',
            'bonne',
            'moyenne',
            'Pas mal',
            'à changer'
        ];

        if( $item === null){
            return $states;
        }else{
            return $states[$item];
        }
    }

    public static function observation_types( $item = null ){

        $types = [
            'Bonne',
            'Entre les deux',
            'Mauvaise'
        ];

        if( $item === null){
            return $types;
        }else{
            return $types[$item];
        }
    }

}

class Math {
    //$moneyArray = Math::countMoney( $whatPayed , $totalShouldBePayed );

    public static function countMoney( $min = 0, $max = 0 ){

        $array = [];

        $array['money'] = $min - $max;

        $array['payment'] = true;

        if( $array['money'] < 0 ){

            $array['class'] = 'danger';
            $array['payment'] = false;

        }
        elseif( $array['money'] > 0 ){

            $array['class'] = 'warning';

        }
        else{

            $array['class'] = 'success';

        }

        return $array;

    }


}


class Timing {

    public static function createMonthsForYear( $id ){

        $array = [

                1,2,3,4,5,6,9,10,11,12

            ];

        $year = Year::find( $id );

        $year->months()->sync($array);

        return $array;

    }

}


class Relation {


    public static function linkSubcourse2Course($course){

        $sorting = $course->subcourses()->pluck('sorting')->toArray();

        sort($sorting);

        $end = end($sorting);

        $course->subcourses()->attach($subcourse->id, ['sorting' => ++$end ]);

        return $end;

    }





    public static function linkSubcourse2CourseAfter($course,$subcourse, $id){

        $beforeItem = PivotCoursub::where('course_id', $course->id)->where('subcourse_id', $id)->first();

        $sortOfBefore = $beforeItem->sorting;

        $sorting = $course->subcourses()->pluck('sorting')->toArray();

        sort($sorting);

        $baster = $sortOfBefore +1;
        $baster2 = false;

        foreach ($sorting as $sort) {

            if( $sort ==  $baster){

                $toChange = PivotCoursub::where('course_id', $course->id)->where('subcourse_id', $id)->where('sorting', $baster)->first();

                if( $toChange ){

                    if( $baster2 == false ){

                        $course->subcourses()->attach($subcourse->id, ['sorting' => $baster ]);

                        $baster2 = true;

                    }

                    $toChange->sorting = ++$baster;
                    $toChange->save();

                    continue;
                }


            }

            if( $baster2 ){

                $toChange = PivotCoursub::where('course_id', $course->id)->where('sorting', $baster)->first();

                $toChange->sorting = ++$baster;
                $toChange->save();

            }


        }

        return $sortOfBefore;

    }








//Relation::linkSubcourse2CourseBefore($course, $newsubcourse ,$subcourse->id);

    public static function linkSubcourse2CourseBefore($course,$subcourse, $id){

        $beforeItem = PivotCoursub::where('course_id', $course->id)->where('subcourse_id', $id)->first();

        $sortOfBefore = $beforeItem->sorting;

        $sorting = $course->subcourses()->pluck('sorting')->toArray();

        sort($sorting);

        $baster = $sortOfBefore;
        $baster2 = false;

        foreach ($sorting as $sort) {

            if( $sort ==  $baster){

                $toChange = PivotCoursub::where('course_id', $course->id)->where('subcourse_id', $id)->where('sorting', $baster)->first();

                if( $toChange ){

                    if( $baster2 == false ){

                        $course->subcourses()->attach($subcourse->id, ['sorting' => $baster ]);

                        $baster2 = true;

                    }

                    $toChange->sorting = ++$baster;
                    $toChange->save();

                    continue;
                }


            }

            if( $baster2 ){

                $toChange = PivotCoursub::where('course_id', $course->id)->where('sorting', $baster)->first();

                $toChange->sorting = ++$baster;
                $toChange->save();

            }


        }

        return $sortOfBefore;

    }


    public static function fillPopulateMeeting($meeting_id){

        $meeting = Meeting::find( $meeting_id );

        $meetingtype = Meetingtype::find( $meeting->meetingtype_id );

        $loop = json_decode( $meetingtype->roles , true);

        foreach ($loop as $role) {
        # code...
            $people = User::where('role', $role )->pluck('id')->toArray();

            //dd($people);

            foreach ($people as $invited_id) {
            # code...

                Meetingpopulating::create([
                    'meeting_id' =>  $meeting->id,
                    'creator_id' => Auth::id(),
                    'invited_id' => $invited_id
                ]);

            }


        }

    }


    public static function fillStudentsFournituration( TheClass $the_class, Fourniture $fourniture  ){

        $year = Session::get('yearId');

        foreach ($the_class->students as $student) {
            # code...
            Fournituration::create([
                'student_id' => $student->id,
                'year_id' => $year,
                'the_class_id' => $the_class->id,
                'fourniture_id' => $fourniture->id
            ]);
        }

    }

    public static function fillFournituration( $student , $year , $class  ){

        $the_class = TheClass::find( $class);


        foreach ($the_class->fournitures as $fourniture) {
            # code...
            Fournituration::create([
                'student_id' => $student,
                'year_id' => $year,
                'the_class_id' => $the_class->id,
                'fourniture_id' => $fourniture->id
            ]);
        }


    }
    public static function fillStudentsPayment( $student , $year , $class , $shouldPay = 0,$transportPay = 0,$addClassesPay = 0, $addSavingPay = 0,$addAssurencePay = 0, $addTransAssurencePay  ){

        $months = Month::findMany([1, 2, 3, 4, 5, 6, 9, 10, 11, 12]);

        foreach ($months as $month) {
            # code...

            StudentsPayment::create([
                'user_id' => $student,
                'year_id' => $year,
                'the_class_id' => $class,
                'month_id' => $month->id,
                'should_pay' => $shouldPay,
                'transport_pay' => $transportPay,
                'add_classes_pay' => $addClassesPay,
            ]);

        }

        // frais denreg

        $saving = Month::find(13);


        StudentsPayment::create([
            'user_id' => $student,
            'year_id' => $year,
            'the_class_id' => $class,
            'month_id' => $saving->id,
            'should_pay' => $addSavingPay,
            'transport_pay' => 0,
            'add_classes_pay' => 0,
        ]);

        // frais assurenc

        $assurence = Month::find(14);


        StudentsPayment::create([
            'user_id' => $student,
            'year_id' => $year,
            'the_class_id' => $class,
            'month_id' => $assurence->id,
            'should_pay' => $addAssurencePay,
            'transport_pay' => 0,
            'add_classes_pay' => 0,
        ]);

        // frais trans asurence

        $trans_assurence = Month::find(15);


        StudentsPayment::create([
            'user_id' => $student,
            'year_id' => $year,
            'the_class_id' => $class,
            'month_id' => $trans_assurence->id,
            'should_pay' => $addTransAssurencePay,
            'transport_pay' => 0,
            'add_classes_pay' => 0,
        ]);


    }
    //($user->id, Session::get('yearId'), $request->should_be_payed, $request->cnss, $request->payment);
    //elation::fillUsersPayment($user->id, Session::get('yearId'), $request->should_be_payed, $request->cnss, $request->payment);

    public static function fillUsersPayment( $user , $year  ,$shouldBePayed ,$cnssPayment ){

        $months = Month::findMany([1, 2, 3, 4, 5, 6, 9, 10, 11, 12]);

        foreach ($months as $month) {
            # code...

            Userspayment::create([
                'user_id' => $user,
                'year_id' => $year,
                'month_id' => $month->id,
                'should_be_payed' => $shouldBePayed,
                'cnss_payment' => $cnssPayment

            ]);

        }

    }

    public static function byModel($model, $id){

        $model_name = 'App\\'.$model;
        return $model_name::where('id', $id)->first();

    }

}

class Application{

/*
public static function states( $item = null ){

    $states = [
        'Toute neuf',
        'Trés bonne',
        'bonne',
        'moyenne',
        'Pas mal',
        'à changer'
    ];

    if( $item === null){
        return $states;
    }else{
        return $states[$item];
    }
}
*/
    public static function family_situation( $item = null ){
      if( $item ){
          return 'marié';
      }else{
          return 'célibataire';
      }
    }

    public static function fillPresentButton($model){

        $array = [];

        //dd($model);

        $present = $model->present;

        if( (bool) $present ){

            //$existArray[ 'icon' ] = '<i class="fa fa-check"></i>';
            $array[ 'icon' ] = 'V';
            $array[ 'class' ] = 'success';

        }else{

            //$existArray[ 'icon' ] = '';
            $array[ 'icon' ] = 'X';
            $array[ 'class' ] = 'danger';

        }


        return $array;
    }


    public static function formatDate4Html($date1){

          $d1 = new Carbon( $date1  );
          $date1 =  $d1->format('Y-m-d h:i');
          $ex = explode(" ",$date1);
          return implode("T",$ex);
    }

    public static function fillTerminatedButtonCalling($model){

        $array = [];


        //dd($model);

        $terminated = $model->terminated;
        $result = $model->result;

        if( (bool) $terminated ){

            //$existArray[ 'icon' ] = '<i class="fa fa-check"></i>';
            $array[ 'icon' ] = 'Términer';
            $array[ 'class' ] = 'success';

            if( $result == '' || $result == null ){

                $array[ 'icon' ] .= 'Un résultat doit etre ecrit le plus vite possible';

            }


        }else{

            //$existArray[ 'icon' ] = '<i class="fa fa-check"></i>';
            $array[ 'icon' ] = 'Pas encore términer';
            $array[ 'class' ] = 'danger';




        }


        return $array;
    }

    public static function fillRejectedButton($model){

        $array = [];

        //dd($model);

        $rejected = $model->rejected;

        if( (bool) $rejected ){

            //$existArray[ 'icon' ] = '<i class="fa fa-check"></i>';
            $array[ 'icon' ] = 'V';
            $array[ 'class' ] = 'success';

        }else{

            //$existArray[ 'icon' ] = '<i class="fa fa-check"></i>';
            $array[ 'icon' ] = 'X';
            $array[ 'class' ] = 'danger';

        }


        return $array;
    }

    public static function fillConfirmedButton($model){

        $array = [];

        //dd($model);

        $confirmed = $model->confirmed;

        if( (bool) $confirmed ){

            //$existArray[ 'icon' ] = '<i class="fa fa-check"></i>';
            $array[ 'icon' ] = 'V';
            $array[ 'class' ] = 'success';

        }else{

            //$existArray[ 'icon' ] = '<i class="fa fa-check"></i>';
            $array[ 'icon' ] = 'X';
            $array[ 'class' ] = 'danger';

        }


        return $array;
    }

    public static function fillReportedButton($model){

        $array = [];


        //dd($model);

        $reported = $model->reported;

        if( (bool) $reported ){

            //$existArray[ 'icon' ] = '<i class="fa fa-check"></i>';
            $array[ 'icon' ] = 'Deja reporté';
            $array[ 'class' ] = 'success';

        }else{

            //$existArray[ 'icon' ] = '<i class="fa fa-check"></i>';
            $array[ 'icon' ] = 'Reporter maintenent';
            $array[ 'class' ] = 'info';

        }


        return $array;
    }

    public static function fillExistButton($model){

        $existArray = [];

        //dd($model);

        $exist = $model->exist;

        if( (bool) $exist ){

            //$existArray[ 'icon' ] = '<i class="fa fa-check"></i>';
            $existArray[ 'icon' ] = 'V';
            $existArray[ 'class' ] = 'success';

        }else{

            //$existArray[ 'icon' ] = '<i class="fa fa-check"></i>';
            $existArray[ 'icon' ] = 'X';
            $existArray[ 'class' ] = 'danger';

        }

        $confirmed = (bool) $model->confirmed;
        $rejected = (bool) $model->rejected;
        $required = (bool) $model->fourniture->required;

        if(  $exist &&  $confirmed && !$rejected){

            $existArray[ 'statu' ] = '<p id="statu-'.$model->id.'">confirmé de puis ladministration</p>';

        }elseif( $exist && !$confirmed){

            $existArray[ 'statu' ] = '<p id="statu-'.$model->id.'">pas encore confirmé de puis ladministration</p>';

        }elseif( !$exist && $required){

            $existArray[ 'statu' ] = '<p id="statu-'.$model->id.'">Tu doit porter cette fourniture emidatement</p>';

        }elseif( !$model->exist && !$required){

            $existArray[ 'statu' ] = '<p id="statu-'.$model->id.'">Cette fourniture est optional</p>';

        }else{
            $existArray[ 'statu' ] = '<p id="statu-'.$model->id.'">Tu doit contacter ladministration apropos de cette fourniture</p>';
        }




        return $existArray;
    }

    public static function fillMonthButton($model, $monthId, $year , $class){

        //$u = User::where('role', 1)->first();

        //dd($u->payments()->where('month_id', 9 )->where('year_id', 1 )->where('class_id', 5 )->first()

            $month = $model->payments()->where('month_id', $monthId )->where('year_id', $year )->where('the_class_id', $class )->first();

            $totalShouldPay = $month->should_pay + $month->add_classes_pay + $month->transport_pay;

            $moneyArray = Math::countMoney( $month->payment , $totalShouldPay );

            return $moneyArray;
    }

    public static function fillMonthButtonUser($model, $monthId, $year ){

            $month = $model->userpayments()->where('month_id', $monthId )->where('year_id', $year )->first();

            $totalShouldPay = $month->should_be_payed + $month->cnss_payment;

            $moneyArray = Math::countMoney( $month->payment , $totalShouldPay );

            return $moneyArray;
    }

    public static function fillBarMonthsBD( ){

        $months = Month::findMany([9, 10, 11, 12]);

        $year = Year::find(Session::get('yearId'));

        $catBenefits = HistoryCategory::where('kind', 2)->pluck('id');

        $catDefecits = HistoryCategory::where('kind', 0)->pluck('id');

        $arrayJson = [];

        $yearBD = ['y' => 'resultat finale de '.Session::get('yearName') , 'a' => 0, 'b' => 0 ];


        foreach ($months as $month) {
            # code...

            $monthBenifits = History::whereYear('created_at', '=', $year->min)
                  ->whereMonth('created_at', '=', $month->id)->whereIn('category_history_id', $catBenefits)->sum('payment');

            $monthDefecits = History::whereYear('created_at', '=', $year->min)
                  ->whereMonth('created_at', '=', $month->id)->whereIn('category_history_id', $catDefecits)->sum('payment');

            array_push( $arrayJson , [ 'y' => $month->name,'a' => $monthBenifits , 'b' => $monthDefecits ]);

            $yearBD['a'] += $monthBenifits;

            $yearBD['b'] += $monthDefecits;



        }

        $months = Month::findMany([1, 2, 3, 4, 5, 6, 7, 8 ]);


        foreach ($months as $month) {
            # code...

            $montheBenifits = History::whereYear('created_at', '=', $year->max)
                  ->whereMonth('created_at', '=', $month->id)->whereIn('category_history_id', $catBenefits)->sum('payment');

            $monthDefecits = History::whereYear('created_at', '=', $year->max)
                  ->whereMonth('created_at', '=', $month->id)->whereIn('category_history_id', $catDefecits)->sum('payment');

            array_push( $arrayJson , [ 'y' => $month->name,'a' => $monthBenifits , 'b' => $monthDefecits ]);

            $yearBD['a'] += $monthBenifits;

            $yearBD['b'] += $monthDefecits;

        }

        array_push( $arrayJson, $yearBD );

        return $arrayJson;

    }


}
