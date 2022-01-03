<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class departement extends Model
{
    protected $table = 'departement';
    protected $fillable = ['nama_departement'];
    public $timestamps = false;

    public function suratmasuk() {
        return $this->hasmany('App\tbl_surat_masuk', 'id_departement');
    }

    public function suratkeluar() {
        return $this->hasmany('App\tbl_surat_keluar', 'id_departement');
    }

    public function user() {
        return $this->hasmany('App\User', 'id_departement');
    }

    public function asal_suratmasuk()
    {
        return $this->hasMany('App\tbl_surat_masuk', 'asal_departement', 'id');
    }
}
