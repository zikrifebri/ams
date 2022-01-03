<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disposisi extends Model
{
    protected $table = 'tbl_disposisi';
    protected $guarded = [];
    protected $date = ['created_at','updated_at'];

    public function tbl_surat_masuk()
    {
        $this->belongsTo('App\tbl_surat_masuk', 'tbl_surat_masuk_id');   
    }
}
