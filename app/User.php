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
        'name', 'email', 'password','last_name','gender','birth_date','birth_place','city','zip_code','adress','phone','img','role','transport','additional_classes','fill_payment','profession','family_situation','cv', 'the_class_id', 'cin', 'phone', 'phone2', 'phone3', 'fix', 'whatsapp', 'cnss', 'cnss_id'
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

    public function relashionshipsStudentsParent()
    {
        return $this->belongsToMany('App\User', 'relashionships','parent_id', 'student_id')->withPivot('categoryship_id');
    }

    public function relashionshipsParentsStudent()
    {
        return $this->belongsToMany('App\User', 'relashionships','student_id', 'parent_id')->withPivot('categoryship_id');
    }

    public function userpayments()
    {
        return $this->hasMany('App\Userspayment');
    }

    public function testyearsubclasses()
    {
        return $this->hasMany('App\Testyearsubclass', 'teatcher_id');
    }

    public function maker()
    {
        return $this->hasMany('App\Courseyearsubclass', 'teatcher_id');
    }

    public function the_class()
    {
        return $this->belongsTo('App\TheClass');
    }

    public function fourniturations()
    {
        return $this->hasMany('App\Fournituration');
    }


    public function byme()
    {
        return $this->belongsToMany('App\User', 'observations','observer_id', 'observed_id')
        ->withPivot('id')
        ->withPivot('title')
        ->withPivot('observation')
        ->withPivot('type')
        ->withPivot('seen')
        ->withPivot('reported')
        ;
    }

    public function aboutme()
    {
        return $this->belongsToMany('App\User', 'observations','observed_id', 'observer_id' )
        ->withPivot('id')
        ->withPivot('title')
        ->withPivot('observation')
        ->withPivot('type')
        ->withPivot('seen')
        ->withPivot('reported')
        ;
    }

    public function calls()
    {
        return $this->belongsToMany('App\User', 'callings','caller_id', 'parent_id')
            ->withPivot('id')
            ->withPivot('object')
            ->withPivot('time1')
            ->withPivot('time2')
            ->withPivot('time3')
            ->withPivot('seen')
            ->withPivot('agree')
            ->withPivot('timeChoosenComming')
            ->withPivot('otherTimeComming')
            ->withPivot('disagrement')
            ->withPivot('year_id')
            ->withPivot('terminated')
            ->withPivot('result')
        ;
    }

    public function tocome()
    {
        return $this->belongsToMany('App\User', 'callings','parent_id', 'caller_id' )
            ->withPivot('id')
            ->withPivot('object')
            ->withPivot('time1')
            ->withPivot('time2')
            ->withPivot('time3')
            ->withPivot('seen')
            ->withPivot('agree')
            ->withPivot('timeChoosenComming')
            ->withPivot('otherTimeComming')
            ->withPivot('disagrement')
            ->withPivot('year_id')
            ->withPivot('terminated')
            ->withPivot('result')
        ;
    }

    public function meetings_created()
    {
        return $this->hasMany('App\Meetingpopulating', 'creator_id' );
    }

    public function meetings_invited()
    {
        return $this->hasMany('App\Meetingpopulating', 'invited_id' );
    }



}
