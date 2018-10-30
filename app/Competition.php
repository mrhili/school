<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    //
    protected $fillable = [
      'name','type','desc','winner_team', 'discipline_id'
    ];

    public function teams()
    {
        return $this->belongsToMany('App\Team')->withPivot('points', 'eliminated');
    }
    public function discipline()
    {
        return $this->belongsTo('App\Discipline');
    }


}
