<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relashionship extends Model
{
    //
    protected $table = 'relashionships';

    
    protected $fillable = [
        'student_id','parent_id', 'categoryship_id'
    ];

    public function category()
    {
        return $this->belongsTo('App\Categoryship', 'categoryship_id');
    }

    public function student()
    {
        return $this->belongsTo('App\User', 'student_id');
    }

    public function parent()
    {
        return $this->belongsTo('App\User', 'parent_id');
    }

}
