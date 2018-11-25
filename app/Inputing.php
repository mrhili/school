<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inputing extends Model
{
    protected $fillable = [
    	'monthlypay_id','user_id','year_id','school_id','payment','should_pay','payment_complete'
    ];

    public function monthlypay(){

    	$this->belongsTo('App\Monthlypay');

    }

    public function user(){

    	$this->belongsTo('App\User');

    }

    public function year(){

    	$this->belongsTo('App\Year');

    }

    public function school(){

    	$this->belongsTo('App\School');

    }
}
