<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PivotCoursub extends Model
{
    //

    public $table = "course_subcourse";

    public function course(){

      return $this->belongsTo('App\Course');

    }

    public function subcourse(){

      return $this->belongsTo('App\Subcourse');

    }

}
