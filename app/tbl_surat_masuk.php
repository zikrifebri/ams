<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_surat_masuk extends Model
{
    protected $table = 'tbl_surat_masuk';
    public $timestamps = false;
    protected $guarded = [];

    protected $dates = ['tgl_surat','tgl_diterima'];
    

    public function departement() {
        return $this->belongsTo('App\departement', 'id_departement');
    }

    public function scopedepartement($query, $id_departement) {
        return $query->where('id_departement', $id_departement);
    }

    public function asal_surat_departement() {
        return $this->belongsTo('App\departement', 'asal_departement');
    }

    public function tbl_surat_keluar(){
        return $this->belongTo('App\tbl_surat_keluar', 'tbl_surat_keluar_id');
    }

    public function disposisi()
    {
        return $this->hasOne('App\Disposisi', 'tbl_surat_masuk_id');
    }
}
