<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Observation extends Model
{
    //


    protected $fillable = [

		'observer_id',
		'observed_id',
		'title',
		'observation',
		'type',
		'year_id',
		'seen',
		'reported'

    ];

    
}
