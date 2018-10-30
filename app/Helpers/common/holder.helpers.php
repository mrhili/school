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
class Holder {

  public static function post_types($item = null ){

      $types = [
          'Pas confirmé',
          'Rien attaché',
          'Images',
          'Video online',
          'Lien'

      ];


      if( $item === null){
          return $types;
      }else{
          return $types[$item];
      }

  }

  public static function competition_types($item = null ){

      $types = [
          'KO',
          //leag is when everyone debate with everyone and how many he will beat
          //maybe it turn to knocout in  equal situation
          'League',
          'Jujed',
          //rab7in kayb9aw f jiha w lkhasrin f jiha wrab7 flkhasrin hasou yghlab rab7 jouj
          'Double',
          'Triple'
      ];


      if( $item === null){
          return $types;
      }else{
          return $types[$item];
      }

  }


  public static function bootstrapClasses( ){

      $backgrounds = [
          'active',
          'primary',
          'info',
          'success',
          'warning',
          'danger'
      ];


      return $backgrounds[array_rand($backgrounds)];

  }


  public static function modelTypes4file( $item = null ){

      $types = [
          ['model' => 'Test', 'folder' => 'tests'],
          ['model' => 'Note', 'folder' => 'notes'],
          ['model' => 'Post', 'folder' => 'posts']
      ];

      if( $item === null){
          return $types;
      }else{
          return $types[$item];
      }
  }

  public static function fileTypes( $item = null ){

      $types = [
          'Image',
          'Pdf',
          'Documents'
      ];

      if( $item === null){
          return $types;
      }else{
          return $types[$item];
      }

  }


  public static function testTypes( $item = null ){

      $types = [
          ['link','Link'],
          ['picture-o','Images'],
          ['internet-explorer','Online'],
          ['file-pdf-o','PDF'],
          ['file-text','Document'],
          ['indent','Editor']
      ];

      if( $item === null){
          return $types;
      }else{
          return $types[$item];
      }
  }


    public static function deficiteTypes( $item = null ){

        $types = [
            'Transport',
            'Object',
            'Room',
            'fourniture'
        ];

        if( $item === null){
            return $types;
        }else{
            return $types[$item];
        }

    }

    public static function repeatedTypes( $item = null ){

        $teaserTypes = [
            'Tout les jours',
            'Tout les semaines',
            'Tout les mois'
        ];

        if( $item === null){
            return $teaserTypes;
        }else{
            return $teaserTypes[$item];
        }

    }

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
