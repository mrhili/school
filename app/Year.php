<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    //

    protected $fillable = [
        'name','name','name','name','name','name','name','name','name','name','name',
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

}
