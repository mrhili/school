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




}
