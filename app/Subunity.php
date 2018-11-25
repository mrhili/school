<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subunity extends Model
{
    protected $fillable = ['name', 'unity_id', 'desc', 'school_id', 'user_id'];


    public function unity()
    {
        return $this->belongsTo('App\Unity');
    }

    public function schools(){

    	return $this->belongsToMany('App\School');

    }

    public function subsubunities(){

    	return $this->hasMany('App\Subsubunity');

    }

    public function classes(){
        return $this->belongsToMany('App\TheClass');
    }

    public function by(){
        return $this->belongsTo('App\User');
    }

    public function for(){
        return $this->belongsTo('App\School');
    }


    //it is good for

    public function sublevels(){

    	return $this->belongsToMany('App\Sublevel');

    }

    public function tests(){

        return $this->belongsToMany('App\Test');

    }

    //public function subjects()
    //{
    //    return $this->hasMany('App\Subject');
    //}

}
