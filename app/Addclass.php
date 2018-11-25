<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Addclass extends Model
{


    protected $fillable = ['name', 'limit_students', 'start_date', 'school_id', 'type_payments', 'price', 'info'];

    public function school(){
    	return $this->belongsTo('App\School');
    }

    public function sublevels(){

    	return $this->belongsToMany('App\Sublevel')->withPivot('price');

    }

    public function unities()
    {
        return $this->belongsToMany('App\Unity')->withPivot('teatcher_id');
    }

    public function teatcher()
    {
        return $this->belongsToMany('App\User')->withPivot('unity_id');
    }

    
}
