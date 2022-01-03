<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tbl_surat_masuk;
use App\tbl_surat_keluar;

class suratController extends Controller
{
    public function index(){

        return view('index');   
    }

    public function dateMutator(){
        $suratmasuk = tbl_surat_masuk::findOrFail(1);
        $suratkeluar= tbl_surat_keluar::findOrFail(1);
        $tgl_surat = $suratmasuk->tgl_surat->format('d-m-Y');
        $tgl_diterima = $suratmasuk->tgl_diterima->format('d-m-Y');
    }

}
