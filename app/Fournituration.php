<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fournituration extends Model
{
    //
    protected $fillable = ['student_id', 'teatcher_id', 'fourniture_id', 'year_id', 'confirmed', 'rejected', 'exist'];

    public function fourniture()
    {
        return $this->belongsTo('App\Fourniture');
    }

	public function student()
    {
        return $this->belongsTo('App\User');
    }

}
