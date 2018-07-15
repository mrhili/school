<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meetingpopulatingrating extends Model
{
    //
    protected $fillable = [
      'meetingpopulating_id',
      'user_id',
      'rating_id'
    ];
}
