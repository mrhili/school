<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','last_name','gender','birth_date','birth_place','city','zip_code','adress','phone','img','role','transport','additional_classes','fill_payment','profession','family_situation','cv', 'the_class_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function payments()
    {
        return $this->hasMany('App\StudentsPayment');
    }

    public function histories()
    {
        return $this->hasMany('App\History');
    }



}
