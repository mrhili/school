<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentsPayment extends Model
{


    protected $fillable = ['user_id', 'year_id', 'month_id', 'the_class_id','should_pay','transport_pay','add_classes_pay','payment','payment_complete'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function year()
    {
        return $this->belongsTo('App\Year');
    }

    public function class()
    {
        return $this->belongsTo('App\TheClass', 'the_class_id');
    }

    public function month()
    {
        return $this->belongsTo('App\Month', 'month_id');
    }


}
