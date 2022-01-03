<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tbl_surat_keluar;
use App\tbl_surat_masuk;
use App\departement;
use App\Disposisi;
use App\User;
use App\Http\Requests\SuratKeluarRequest;
use Storage;

class skController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index()
    {
        if(auth()->user()->level == 'kepala') {
            $suratkeluar_list = tbl_surat_keluar::where('asal_departement', auth()->user()->id_departement)
                            ->orderBy('id', 'desc')->Paginate(3);
            $jumlah_suratkeluar = tbl_surat_keluar::where('asal_departement', auth()->user()->id_departement)
                                                        ->count();
            return view('suratkeluar.index' , compact('suratkeluar_list','jumlah_suratkeluar'));
        } else if(auth()->user()->level == 'operator') {
            $suratkeluar_list = tbl_surat_keluar::where('asal_departement', auth()->user()->id_departement)
                            ->orderBy('id', 'desc')->Paginate(3);
            $jumlah_suratkeluar = tbl_surat_keluar::where('asal_departement', auth()->user()->id_departement)
                                                        ->count();
            return view('suratkeluar.index' , compact('suratkeluar_list','jumlah_suratkeluar')); 
        } else if(auth()->user()->level == 'admin') {
            $suratkeluar_list = tbl_surat_keluar::orderBy('id', 'desc')
                            ->Paginate(3);
            $jumlah_suratkeluar = tbl_surat_keluar::count();
            return view('suratkeluar.index' , compact('suratkeluar_list','jumlah_suratkeluar'));
        }
    }

    public function create()
    {
        return view('suratkeluar.create');
    }

    public function store(SuratKeluarRequest $request)
    {
        $input = $request->all();
//File
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $ext  = $file->getClientOriginalExtension();
            if ($request->file('file')->isValid()) {
                $file_name = date('YmdHis'). ".$ext";
                $upload_path = 'fileupload';
                $request->file('file')->move($upload_path, $file_name);
                $input['file'] = $file_name;
            }
        }
        $input['asal_departement'] = auth()->user()->id_departement;
        $input['status_diterima'] = 0;
        $suratkeluar = tbl_surat_keluar::create($input);
        // dd($suratkeluar->id);
        $suratmasuk = tbl_surat_masuk::create([
            'users_id' => 0,
            'tbl_surat_keluar_id' => $suratkeluar->id,
            'no_agenda' => $suratkeluar->no_agenda,
            'no_surat' => $suratkeluar->no_surat,
            'id_departement' => $suratkeluar->id_departement,
            'asal_departement' => $suratkeluar->asal_departement,
            'perihal' => $suratkeluar->perihal,
            'kode' => $suratkeluar->kode,
            'tgl_surat' => $suratkeluar->tgl_surat,
            'proses_disp' => 0,
            'tgl_diterima' => null,
            'keterangan' => $suratkeluar->keterangan,
            'file' => $suratkeluar->file,
            'status_terusan' => 0
        ]);
        
        $user = User::where('id_departement', $suratkeluar->id_departement)
                    ->where('level','kepala')
                    ->first();
        
        $disposisi = Disposisi::create([
            'tbl_surat_masuk_id' => $suratmasuk->id,
            'id_departement' => $suratkeluar->id_departement,
            'user_id' => $user->id,
            'pesan' => null
        ]);

        return redirect('surat-keluar');
    }

    public function show(tbl_surat_keluar $suratkeluar)
    {
        return view('suratkeluar.show', compact('suratkeluar'));
    }

    public function edit(tbl_surat_keluar $suratkeluar)
    {
        return view('suratkeluar.edit', compact('suratkeluar'));
    }

    public function update(tbl_surat_keluar $suratkeluar, SuratKeluarRequest $request)
    {
        $input = $request->all();      

        if ($request->hasFile('file')) {
            $exist = Storage::disk('file')->exists($suratkeluar->file);
            if (isset($suratkeluar->file) && $exist) {
                $delete = Storage::disk('file')->delete($suratkeluar->file);
            }
            $file = $request->file('file');
            $ext = $file->getClientOriginalExtension();
            if ($request->file('file')->isValid()) {
                $file_name = date('YmdHis'). ".$ext";
                $upload_path = 'fileupload';
                $request->file('file')->move($upload_path, $file_name);
                $input['file'] = $file_name;
            }
        }

        $suratkeluar->update($input);
        $suratmasuk = tbl_surat_masuk::where('tbl_surat_keluar_id', $suratkeluar->id)
                                    ->update([
                                        'no_agenda' => $suratkeluar->no_agenda,
                                        'id_departement' => $suratkeluar->id_departement,
                                        'no_surat' => $suratkeluar->no_surat,
                                        'perihal' => $suratkeluar->perihal,
                                        'kode' => $suratkeluar->kode,
                                        'tgl_surat' => $suratkeluar->tgl_surat,
                                        'keterangan' => $suratkeluar->keterangan,
                                        'file' => $suratkeluar->file

                                    ]);
        return redirect('surat-keluar');
    }

    public function destroy(Request $request)
    {
        // dd($request->id);
        $suratkeluar = tbl_surat_keluar::where('id', $request->id)->first();
        $exist = Storage::disk('file')->exists($suratkeluar->file);
        if (isset($suratkeluar->file) && $exist) {
            $delete = Storage::disk('file')->delete($suratkeluar->file);
        }
        tbl_surat_keluar::where('id', $request->id)->delete();
        $suratmasuk = tbl_surat_masuk::where('tbl_surat_keluar_id', $suratkeluar->id)
                                    ->delete();
        return redirect('surat-keluar');
    }

    public function cari(Request $request)
    {
        $kata_kunci     = trim($request->input('kata_kunci'));
        
        if (! empty($kata_kunci)) {
            $id_departement   = $request->input('id_departement');
               
            $query          = tbl_surat_keluar::where('no_surat', 'LIKE', '%'.
            $kata_kunci     . '%');
            (! empty($id_departement)) ? $query
            ->departement($id_departement) : '';
            $suratkeluar_list= $query->paginate(3);

            $pagination = (! empty($id_departement)) ? $pagination     =
            $suratkeluar_list->appends(['id_departement' => $id_departement]) : '';
            $pagination = $suratkeluar_list->appends(['kata_kunci'
            => $kata_kunci]);
            
                $jumlah_suratkeluar   = $suratkeluar_list->total();
                return view('suratkeluar.index', compact('suratkeluar_list', 
                'kata_kunci', 'pagination', 'jumlah_suratkeluar',
            'id_departement'));
        }

    return redirect('surat-keluar');
    }
}
