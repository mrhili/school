<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teatchification extends Model
{
    //
    protected $fillable = [ 'subject_the_class_id', 'user_id', 'year_id' ];

    public function year(){

    	return $this->belongsTo('App\Year');

    }

    public function teatcher(){

    	return $this->belongsTo('App\User', 'user_id');

    }

    public function subject_class(){

    	return $this->belongsTo('App\Subjectclass', 'subject_the_class_id');

    }
}
