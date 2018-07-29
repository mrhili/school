<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subjectclass extends Model
{
    //
    protected $table = "subject_the_class";

    protected $fillable = [
		"subject_id",
		"the_class_id"
    ];

    public function testyearsubclasses()
    {
        return $this->hasMany('App\Testyearsubclass');
    }

    public function cousepopuating()
    {
        return $this->hasMany('App\Courseyearsubclass');
    }

    public function teatchifications()
    {
        return $this->hasMany('App\Teatchification');
    }

}
