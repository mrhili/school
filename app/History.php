<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    //
    protected $fillable = [

    'id_link',

    'class',

    'info',

    'comment',

    'hidden_note',

    'category_history_id',

    'by-admin',

    'by-user',

    'by-exterior-name',

    'by-exterior-info',

    ];


    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->belongsTo('App\HistoryCategory', 'category_history_id');
    }
}
