<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    //
    protected $fillable = ['name', 'subunity_id'];

    public function the_classes()
    {
        return $this->belongsToMany('App\TheClass')->withPivot('parameter');
    }

    public function notes()
    {
        return $this->hasMany('App\Note');
    }

    public function classes()
    {
        return $this->belongsToMany('App\TheClass')->withPivot('parameter');
    }

    //foreach($s->the_classes as $t){echo $t->pivot->parameter;  }


    public function subunity()
    {
        return $this->belongsTo('App\Subunity');
    }


}
