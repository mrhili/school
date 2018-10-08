<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preperfication extends Model
{
    //


  protected $fillable = [
    'title', 'teatchification_id', 'student_id', 'get_it', 'present'
  ];


  public function teatchification(){

    return $this->belongsTo('App\Teatchification');

  }

  public function student(){

    return $this->belongsTo('App\User', 'student_id');

  }








}
