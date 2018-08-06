<?php
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
    PivotCoursub,
    Subjectclass,
    Teatchification,
    Demandefourniture

};

use Session;
use Carbon;
use Auth;
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
