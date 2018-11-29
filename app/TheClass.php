<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TheClass extends Model
{
    //


    protected $fillable = [
        'name','school_id','sublevel_id', 'limit_students'
    ];

    public function school(){
        return $this->belongsTo('App\School');
    }

    public function sublevel(){
        return $this->belongsTo('App\Sublevel');
    }

    public function unities(){
        return $this->belongsToMany('App\Unity');
    }

    public function subunities(){
        return $this->belongsToMany('App\Subunity');
    }

    public function subsubunities(){
        return $this->belongsToMany('App\Subsubunity');
    }

    public function students()
    {
        return $this->hasMany('App\User');
    }

    public function fournitures()
    {
        return $this->belongsToMany('App\Fourniture')->pivot('howmany');
    }

    /*

    public function payments()
    {
        return $this->hasMany('App\StudentsPayment');
    }

    public function subjects()
    {
        return $this->belongsToMany('App\Subject')->withPivot('parameter');
    }

    

    

    */

    //foreach($s->the_classes as $t){echo $t->pivot->parameter;  }

}
