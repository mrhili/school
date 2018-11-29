<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testyearsubclass extends Model
{
    //

    protected $fillable = [
        'subject_the_class_id', 'the_class_id', 'subject_id' ,'test_id','year_id'
        , 'publish', 'teatcher_id', 'is_exercise','navigation','req_publish',
        'end', 'course_id'
    ];

    public function notes()
    {
        return $this->hasMany('App\Note', 'testyearsubclass_id');
    }

//MAY NOT USE

    public function course()
    {
        return $this->belongsTo('App\Course', 'course_id');
    }


    public function test()
    {
        return $this->belongsTo('App\Test', 'test_id');
    }

    public function subjectclass()
    {
        return $this->belongsTo('App\Subjectclass', 'subject_the_class_id');
    }

    public function year()
    {
        return $this->belongsTo('App\Year');
    }

    public function teatcher()
    {
        return $this->belongsTo('App\User', 'teatcher_id');
    }




}
