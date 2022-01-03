<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profil extends Model
{
    protected $guarded = [];
    protected $date = ['created_at','updated_at'];

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }


}
