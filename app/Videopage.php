<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Videopage extends Model
{
    //            $table->tinyInteger('slug')->unique();
    //            $table->string('title');
    //            $table->string('icon');
    //            $table->text('roles');
    protected $fillable = [
        'slug', 'title', 'icon', 'roles'
    ];

    public function tabs(){
        return $this->hasMany('App\Videotab');
    }
}
