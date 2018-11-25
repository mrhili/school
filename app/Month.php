<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Month extends Model
{
    //

    protected $fillable = [
        'name'
    ];

    public function monthlypays()
    {
        return $this->hasMany('App\Monthlypay');
    }


    /*
    public function payments()
    {
        return $this->hasMany('App\StudentsPayment');
    }
    */



}
