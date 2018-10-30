<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
  protected $fillable = [
    'name'
  ];

  public function competitions()
  {
      return $this->hasMany('App\Competition');
  }
}
