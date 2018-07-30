<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    //

    protected $fillable = [
        'name', 'min', 'max'
    ];

    public function payments()
    {
        return $this->hasMany('App\StudentsPayment');
    }

    public function testyearsubclasses()
    {
        return $this->hasMany('App\Testyearsubclass');
    }

    public function coursepopulating()
    {
        return $this->hasMany('App\Courseyearsubclass');
    }

    public function teatchifications()
    {
        return $this->hasMany('App\Teatchification');
    }

    public function subject_class()
    {
        return $this->hasMany('App\Subjectclass');
    }

}
