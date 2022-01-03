<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_surat_keluar extends Model
{
    protected $table = 'tbl_surat_keluar';
    public $timestamps = false;
    protected $fillable = [
            
        'no_agenda',
        'tujuan',
        'no_surat',
        'perihal',
        'kode',
        'tgl_surat',
        'keterangan',
        'file',
        'id_departement',
        'asal_departement',
        'status_diterima'
    ];

    protected $dates = ['tgl_surat'];

    public function departement() {
        return $this->belongsTo('App\departement', 'id_departement');
    }

    public function scopedepartement($query, $id_departement) {
        return $query->where('id_departement', $id_departement);
    }

    public function asal_surat_departement() {
        return $this->belongsTo('App\departement', 'asal_departement');
    }
    
    public function tbl_surat_masuk(){
        return $this->hasOne('App\tbl_surat_masuk', 'tbl_surat_keluar_id');
    }
}
