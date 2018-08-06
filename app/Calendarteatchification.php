<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calendarteatchification extends Model
{
    //
    protected $table = 'calendar_teatchification';

    protected $fillable = ['teatchification_id', 'calendar_id', 'year_id'];


    public function calendar()
    {
        return $this->belongsTo('App\Calendar');
    }

    public function teatchification()
    {
        return $this->belongsTo('App\Teatchification');
    }

    public function year()
    {
        return $this->belongsTo('App\Year');
    }



}
