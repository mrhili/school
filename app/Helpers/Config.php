<?Php

namespace App\Helpers\Config;

use App\Config;


class Setting {
    /**
     * @param int $user_id User-id
     * 
     * @return string
     */
    public static function get_username() {

    }

	public static function getConfig( $slug ){
	
		if( count( Config::where( 'slug', $slug )->first() ) > 0 ){
			return Config::where( 'slug', $slug )->first()->value;
		}else{
			return 'nothing';
		}

	}

	public static function ifImg( $varImg ){



		$imgValue = self::getConfig($varImg);

		if( $varImg == '' || $varImg == null || !file_exists( base_path().'/public/images/config/'.$imgValue )  ){

			return asset('/images/config/'. self::getConfig( 'no-image' ) );

		}else{

			return asset('/images/config/'. $imgValue);

		}

	}

}

//shoul be used like this EnvatoUser::get_username(1);

class Holder {

	public static function configTypes( $item = null ){

		$configTypes = [
			'text' => 'text',
			'textarea' => 'textarea',
			'number' => 'number',
			'file' => 'file'
		];

		if( $item == null){
			return $configTypes;
		}elseif( $item ){
			return $configTypes[$item];
		}

	}

	public static function businessTypes( $item = null ){

		$businessTypes = [
			'rent' => 'rent',
			'sell' => 'sell'
		];

		if( $item == null){
			return $businessTypes;
		}elseif( $item ){
			return $businessTypes[ $item ];
		}

	}



	public static function buildingTypes( $item = null ){

		$buildingTypes = [
			'villa' => 'villa',
			'commercial' => 'commercial',
			'house' => 'house'

		];

		if( $item == null){
			return $buildingTypes;
		}elseif( $item ){
			return $buildingTypes[ $item ];
		}

	}




}