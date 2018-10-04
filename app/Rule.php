<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    //

    protected $fillable = [
      'rule', 'active'
    ];

    public function rulesHolder()
    {
        return $this->belongsToMany('App\User', 'ruleholders', 'rule_id', 'user_id');
    }


    public function holders()
    {
        return $this->hasMany('App\RuleHolder');
    }




}
