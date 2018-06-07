<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testyearsubclass extends Model
{
    //

    protected $fillable = [
        'subject_the_class_id', 'the_class_id', 'subject_id' ,'test_id','year_id', 'publish', 'teatcher_id', 'navigation'
    ];


    public function test()
    {
        return $this->belongsTo('App\Test');
    }

    public function subjectclass()
    {
        return $this->belongsTo('App\Subjectclass');
    }

    public function year()
    {
        return $this->belongsTo('App\Year');
    }

    public function teatcher()
    {
        return $this->belongsTo('App\User', 'teatcher_id');
    }

    public function notes()
    {
        return $this->hasMany('App\Note', 'testyearsubclass_id');
    }
    

}
