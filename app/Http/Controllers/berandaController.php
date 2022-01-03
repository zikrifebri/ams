<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tbl_surat_masuk;
use App\tbl_surat_keluar;
use App\user;
use App\terusan;
use App\departement;
use App\Http\Requests\SuratMasukRequest;
use Storage;


class berandaController extends Controller
{
    public function index(){

        if (auth()->user()->level == 'admin') {
            $jumlah_suratmasuk = tbl_surat_masuk::count();
            $jumlah_suratkeluar = tbl_surat_keluar::count();
            $jumlah_user = user::count();
            $jumlah_asal = departement::count();
            return view('beranda/index' , compact('jumlah_suratmasuk','jumlah_suratkeluar', 'jumlah_user', 'jumlah_asal')); 
        } else if(auth()->user()->level == 'operator') {
            $jumlah_suratmasuk = tbl_surat_masuk::where('id_departement', auth()->user()->id_departement)
                                            ->count();
            $jumlah_suratkeluar = tbl_surat_keluar::where('asal_departement', auth()->user()->id_departement)
                                            ->count();
            return view('beranda/index', compact('jumlah_suratmasuk','jumlah_suratkeluar'));
        } else if (auth()->user()->level == 'kepala'){
            $jumlah_suratmasuk = tbl_surat_masuk::where('id_departement', auth()->user()->id_departement)
                                            ->count();
            $jumlah_suratkeluar = tbl_surat_keluar::where('asal_departement', auth()->user()->id_departement)
                                            ->count();
            return view('beranda/index', compact('jumlah_suratmasuk','jumlah_suratkeluar'));
        }
        else {
            $jumlah_suratmasuk = Terusan::where('user_id', auth()->user()->id)
                                            ->count();
            return view('beranda/index', compact('jumlah_suratmasuk'));
        }
        
            
        
        
    }

}
