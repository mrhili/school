<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sublevel extends Model
{
	protected $fillable = [
		'name', 'level_id'
	];

    public function level(){
    	$this->belongsTo('App\Level');
    }



    public function classes(){

    	return $this->hasMany('App\TheClass');

    }

    public function schools(){

    	return $this->belongsToMany('App\Sublevel')->withPivot('monthly_price');

    }

    public function add_classes(){

    	return $this->belongsToMany('App\Addclass')->withPivot('price');

    }

    //maybe you will read

    public function subunities(){

    	return $this->belongsToMany('App\Subunity');

    }
}
