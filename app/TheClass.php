<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TheClass extends Model
{
    //


    protected $fillable = [
        'name','min','max', 'full'
    ];

    public function payments()
    {
        return $this->hasMany('App\StudentsPayment');
    }

    public function subjects()
    {
        return $this->belongsToMany('App\Subject')->withPivot('parameter');;
    }

    //foreach($s->the_classes as $t){echo $t->pivot->parameter;  }


    
}
