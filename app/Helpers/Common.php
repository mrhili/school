<?Php

namespace App\Helpers\Common;
use File;

use App\Helpers\Config\Setting;

class User {
    /**
     * @param int $user_id User-id
     * 
     * @return string
     */
    public static function get_username() {

    }


}

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

}

//shoul be used like this EnvatoUser::get_username(1);