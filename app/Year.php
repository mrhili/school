<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    //

    protected $fillable = [
        'name', 'min', 'max'
    ];



    public function inputings()
    {
        return $this->hasMany('App\Inputing');
    }

    public function outputings()
    {
        return $this->hasMany('App\Outputing');
    }










    ////IMIGHT NOT USE

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

    public function calendar_teatchification()
    {
        return $this->hasMany('App\Calendarteatchification');
    }

    public function bilings()
    {
        return $this->hasMany('App\Biling');
    }

    public function materialdeficites()
    {
        return $this->hasMany('App\Materialdeficite');
    }

}
