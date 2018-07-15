<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calling extends Model
{
    //
    protected $dates = [
            'time1',
            'time2',
            'time3'
    ];

    protected $fillable = [

            'caller_id',
            'parent_id',
            'object',
            'time1',
            'time2',
            'time3',
            'seen',
            'agree',
            'timeChoosenComming',
            'otherTimeComming',
            'disagrement',
            'year_id',
            'terminated',
            'result',
            'required'

    ];

    public function caller(){

    	return $this->belongsTo('App\User', 'caller_id');

    }

    public function called(){

    	return $this->belongsTo('App\User', 'parent_id');

    }
}
