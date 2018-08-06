<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Demandefourniture extends Model
{
    public $fillable = [
      'fourniture_id',
      'parent_id',
      'student_id' ,
      'howmany',
      'totalmoney',
      'message'
    ];


    public function fourniture()
    {
        return $this->belongsTo('App\Fourniture');
    }

    public function parent()
    {
        return $this->belongsTo('App\User', 'parent_id');
    }

    public function student()
    {
        return $this->belongsTo('App\User', 'student_id');
    }


}
