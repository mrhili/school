<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userspayment extends Model
{
    //

    protected $fillable = ['user_id', 'year_id', 'month_id','should_be_payed','cnss_payment','payment','payment_complete'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
