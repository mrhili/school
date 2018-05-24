<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    //
    protected $fillable = ['name'];

    public function the_classes()
    {
        return $this->belongsToMany('App\TheClass')->withPivot('parameter');
    }

    //foreach($s->the_classes as $t){echo $t->pivot->parameter;  }

}
