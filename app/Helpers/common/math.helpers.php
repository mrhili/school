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


    public static function acceptingDemandeFourniture( Demandefourniture $demande ){
      $array = [];
      $array['youcan'] = false;
      $array['class'] = 'warning';
      $array['text'] = 'Cest mieux de ne pas accepter ou limiter le nombre de fourniture a'. $demande->fourniture->got;
      if( $demande->howmany <= $demande->fourniture->got ){

        $array['youcan'] = true;
        $array['class'] = 'info';
        $array['text'] = 'Accepte des que tu as la money a la poche';

      }

      return $array;


    }




}
