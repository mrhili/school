<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{

    protected $fillable = [

    'id_link',

    'class',

    'info',

    'comment',

    'hidden_note',

    'category_history_id',

    'by_admin',

    'for_user',

    'for_exterior_name',

    'for_exterior_info',

    'payment'

    ];


    public function user()
    {
        return $this->belongsTo('App\User', 'for_user');
    }

    public function admin()
    {
        return $this->belongsTo('App\User','by_admin');
    }

    public function category()
    {
        return $this->belongsTo('App\HistoryCategory', 'category_history_id');
    }

    public function wallet(){
      return $this->hasOne('App\Wallet');
    }
}
