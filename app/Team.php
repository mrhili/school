<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    //
    protected $fillable = [
      'name'
    ];

    public function members()
    {
        return $this->belongsToMany('App\User')->withPivot('capitan');
    }

    public function competitions()
    {
        return $this->belongsToMany('App\Competition')->withPivot('points', 'eliminated');
    }


}
