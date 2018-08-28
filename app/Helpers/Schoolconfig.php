<?Php

namespace App\Helpers\Schoolconfig;

use App\Schoolconfig;


class Setting {


  public static function getConfig( $slug ){

		if( Schoolconfig::where( 'slug', $slug )->count() > 0 ){
			return Schoolconfig::where( 'slug', $slug )->first()->value;
		}else{
			return null;
		}

	}


}

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

}
