<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Month extends Model
{
    //

    protected $fillable = [
        'name'
    ];
    
    public function payments()
    {
        return $this->hasMany('App\StudentsPayment');
    }

}
