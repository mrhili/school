<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Cog\Contracts\Love\Liker\Models\Liker as LikerContract;
use Cog\Laravel\Love\Liker\Models\Traits\Liker;

class User extends Authenticatable implements LikerContract
{
    use Notifiable;
    use Liker;



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name', 'email',
        'password',
        'last_name',
        'arabic_last_name',
        'arabic_name',
        'gender',
        'birth_date',
        'birth_place',
        'city','zip_code',
        'adress',
        'phone',
        'img','role',
        'transport',
        'additional_classes',
        'fill_payment',
        'profession',
        'family_situation','cv',
         'the_class_id',
          'cin', 'phone',
          'phone2', 'phone3', 'fix',
           'whatsapp',
            'cnss', 'cnss_id',
           'num',
           'massarid',
           'facebook'

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getFullNameAttribute() {
    		return ucfirst($this->name) . ' ' . ucfirst($this->last_name);
    }

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

    public function courses_posted()
    {
        return $this->hasMany('App\Courseyearsubclass', 'teatcher_id');
    }

    public function courses_created()
    {
        return $this->hasMany('App\Course', 'created_by');
    }

    public function the_class()
    {
        return $this->belongsTo('App\TheClass', 'the_class_id');
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

    public function teatchifications()
    {
        return $this->hasMany('App\Teatchification');
    }

    public function myFournitureDemandes()
    {
        return $this->hasMany('App\Demandefourniture', 'parent_id');
    }

    public function fournitureDemandesForMe()
    {
        return $this->hasMany('App\Demandefourniture', 'student_id');
    }

    public function fournitureYouAccepted()
    {
        return $this->hasMany('App\Demandefourniture', 'admin_id');
    }


    public function biled()
    {
        return $this->hasMany('App\Biling', 'user_id');
    }

    public function biling_accepted()
    {
        return $this->hasMany('App\Biling', 'token_id');
    }

    public function catchers()
    {
        return $this->hasMany('App\Catcher');
    }

    public function transparencies()
    {
        return $this->hasMany('App\Transparancy');
    }

    public function rulesHolder()
    {
        return $this->belongsToMany('App\Ruleholder', 'ruleholders', 'user_id', 'rule_id');
    }

    public function rule_holders()
    {
        return $this->hasMany('App\RuleHolder');
    }

    public function messages(){
      return $this->hasMany('App\Contact');
    }

    public function preperfications_as_stud(){
      return $this->hasMany('App\Preperfication', 'student_id');
    }

    public function teams()
    {
        return $this->belongsToMany('App\Team')->withPivot('capitan');
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function appears()
    {
        return $this->belongsToMany('App\Post');
    }

}
