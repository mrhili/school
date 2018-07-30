<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subjectclass extends Model
{
    //
    protected $table = "subject_the_class";

    protected $fillable = [
		"subject_id",
		"the_class_id",
    "year_id"
    ];

    public function testyearsubclasses()
    {
        return $this->hasMany('App\Testyearsubclass');
    }

    public function coursepopuating()
    {
        return $this->hasMany('App\Courseyearsubclass');
    }

    public function teatchifications()
    {
        return $this->hasMany('App\Teatchification');
    }

    public function subject()
    {
        return $this->belongsTo('App\Subject');
    }

    public function year()
    {
        return $this->belongsTo('App\Year');
    }

    public function the_class()
    {
        return $this->belongsTo('App\TheClass');
    }

}
