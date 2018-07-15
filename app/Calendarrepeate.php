<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calendarrepeate extends Model
{
	protected $fillable = ['title','start_date','end_date', 'is_all_day', 'background_color', 'dow'];
    //
    protected $casts = [
	        'dow' => 'array',
	    ];

}
