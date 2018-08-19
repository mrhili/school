<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courseyearsubclass extends Model
{
    //


    protected $fillable = [
        'subject_the_class_id', 'the_class_id', 'subject_id' ,'course_id','year_id', 'publish', 'teatcher_id'
    ];


    public function course()
    {
        return $this->belongsTo('App\Course');
    }

    public function subjectclass()
    {
        return $this->belongsTo('App\Subjectclass', 'subject_the_class_id');
    }

    public function subject()
    {
        return $this->belongsTo('App\Subject', 'subject_id');
    }

    public function class()
    {
        return $this->belongsTo('App\TheClass', 'the_class_id');
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
