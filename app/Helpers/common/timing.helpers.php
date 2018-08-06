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
