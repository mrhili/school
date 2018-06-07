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
    TheClass

};

use Session;
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

    public static function gender( $item = null ){

        $genderTypes = [
            'Feminin',
            'Masculin'
        ];

        if( $item == null){
            return $genderTypes;
        }elseif( $item ){
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

        if( $item == null){
            return $months;
        }elseif( $item ){
            return $months[$item];
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

        if( $item == null){
            return $rolesTypes;
        }elseif( $item ){
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

        if( $item == null){
            return $paymentMethods;
        }elseif( $item ){
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

        if( $item == null){
            return $states;
        }elseif( $item ){
            return $states[$item];
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

    public static function fillStudentsFournituration( $fourniture, $year , $class  ){

        $the_class = TheClass::find( $class);

        
        foreach ($the_class->students as $student) {
            # code...
            Fournituration::create([
                'student_id' => $student->id,
                'year_id' => $year,
                'the_class_id' => $the_class->id,
                'fourniture_id' => $fourniture
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

    public static function fillRejectedButton($model){

        $array = [];

        //dd($model);

        $rejected = $model->rejected;

        if( $rejected ){

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

        if( $confirmed ){

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

    public static function fillExistButton($model){

        $existArray = [];

        //dd($model);

        $exist = $model->exist;

        if( $exist ){

            //$existArray[ 'icon' ] = '<i class="fa fa-check"></i>';
            $existArray[ 'icon' ] = 'V';
            $existArray[ 'class' ] = 'success';

        }else{

            //$existArray[ 'icon' ] = '<i class="fa fa-check"></i>';
            $existArray[ 'icon' ] = 'X';
            $existArray[ 'class' ] = 'danger';

        }

        $confirmed = $model->confirmed;
        $rejected = $model->rejected;
        $required = $model->fourniture->required;

        if( $exist && $confirmed && !$rejected){

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