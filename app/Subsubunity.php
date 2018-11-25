<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subsubunity extends Model
{
	protected $fillable = [
		'name', 'unity_id'
	];
    public function subunity(){

    	return $this->belongsTo('App\Subunity');

    }

    public function classes(){
        return $this->belongsToMany('App\TheClass');
    }
}
