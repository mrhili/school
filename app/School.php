<?php

namespace App;


use Cartalyst\Tags\TaggableTrait;
use Cartalyst\Tags\TaggableInterface;
class School extends Eloquent implements TaggableInterface
{
    use TaggableTrait;

    protected $fillable = [
    	'type','name','description','licence','img','company','city','zip_code',
    	'adress','phone','phone2','fix','facebook_profile','facebook_page','git','google_profile', 'paypal','website','linkedin','youtube','whatsapp','email',
    	'studies_from',
            'studies_to',
            'transport',
            'add_classes',
            'online_programme'
    ];

    public function groupe(){

    	return $this->belongsTo('App\Groupeschool');

    }

    public function config(){

    	return $this->hasOne('App\Schoolconfig');

    }

    public function classes(){

    	return $this->hasMany('App\TheClass');

    }

    public function sublevels(){

    	return $this->belongsToMany('App\Sublevel')->withPivot('monthly_price');

    }

    public function subunity(){

    	return $this->belongsToMany('App\Subunity');

    }

    public function subsubunity(){

    	return $this->belongsToMany('App\Subsubunity');

    }

    public function inputings()
    {
        return $this->hasMany('App\Inputing');
    }

    public function outputings()
    {
        return $this->hasMany('App\Outputing');
    }

    public function tests()
    {
        return $this->hasMany('App\Test');
    }


}
