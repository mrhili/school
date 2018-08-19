<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcourse extends Model
{
    //
    protected $fillable = [
				'title',
				'finishing_time',
				'introduction',
               'body',
                'outro',
                'to_grasp'
    ];

    public function courses(){

    	return $this->belongsToMany('App\Course')->withPivot('sorting')->withPivot('id');

    }



}
