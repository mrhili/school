<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    //
    protected $fillable = [
      'meetingtype_id',
      'name',
      'object',
      'body',
      'time',
      'end_time',
      'place'
    ];

    public function type()
    {
        return $this->belongsTo('App\Metingtype');
    }

    public function populatings()
    {
        return $this->hasMany('App\Meetingpopulating');
    }
}
