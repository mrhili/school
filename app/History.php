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

    'by_admin',

    'by_user',

    'by_exterior_name',

    'by_exterior_info',

    'payment'

    ];


    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->belongsTo('App\HistoryCategory', 'category_history_id');
    }

    public function wallet(){
      return $this->hasOne('App\Wallet');
    }
}
