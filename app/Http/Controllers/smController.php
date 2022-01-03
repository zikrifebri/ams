<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tbl_surat_masuk;
use App\tbl_surat_keluar;
use App\User;
use App\departement;
use App\Terusan;
use App\Disposisi;
use App\Http\Requests\SuratMasukRequest;
use Storage;

class smController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function suratmasuk(){
        if(auth()->user()->level == 'admin')
        {
            $user_list = User::where('level','operator')->get();
            $suratmasuk_list = tbl_surat_masuk::orderBy('id', 'desc')->Paginate(3);
            $jumlah_suratmasuk = tbl_surat_masuk::count();
            return view('suratmasuk' , compact('user_list','suratmasuk_list','jumlah_suratmasuk'));
        } else if(auth()->user()->level == 'operator') {
            $user_list = user::where('id',auth()->user()->id)->get();
            $suratmasuk_list = tbl_surat_masuk::orderBy('id', 'desc')
                                            ->where('id_departement', auth()->user()->id_departement)
                                            ->Paginate(3);
            $jumlah_suratmasuk = tbl_surat_masuk::where('id_departement', auth()->user()->id_departement)
                                            ->count();
            
            $users = User::where('level', 'user')
                        ->where('id_departement', auth()->user()->id_departement)
                        ->get();
            return view('suratmasuk' , compact('user_list','suratmasuk_list','jumlah_suratmasuk','users'));
        } else if(auth()->user()->level == 'kepala') {
            $user_list = user::where('id',auth()->user()->id)->get();
            $suratmasuk_list = tbl_surat_masuk::orderBy('id', 'desc')
                                            ->where('id_departement', auth()->user()->id_departement)
                                            ->Paginate(3);
            $jumlah_suratmasuk = tbl_surat_masuk::where('id_departement', auth()->user()->id_departement)
                                            ->count();
            
            $users = User::where('level', 'user')
                        ->where('id_departement', auth()->user()->id_departement)
                        ->get();

            $disposisi = Disposisi::where('user_id', auth()->user()->id)->first();
            
            
            return view('suratmasuk' , compact('user_list','suratmasuk_list','jumlah_suratmasuk','users','disposisi'));
        }
         else {
            $terusan = Terusan::where('user_id', auth()->user()->id)->get();
            $user_list = User::where('id',auth()->user()->id)->get();
            $suratmasuk_list = tbl_surat_masuk::join('terusans','terusans.tbl_surat_masuk_id','tbl_surat_masuk.id')
                                            ->orderBy('no_agenda', 'asc')
                                            ->where('user_id', auth()->user()->id)
                                            ->Paginate(3);
            $jumlah_suratmasuk = Terusan::where('user_id', auth()->user()->id)
                                            ->count();
            $users = User::where('level', 'user')->get();
            return view('suratmasuk' , compact('user_list','suratmasuk_list','jumlah_suratmasuk','users','terusan'));
        }

    }

    public function show(tbl_surat_masuk $suratmasuk){
        return view('show', compact('suratmasuk'));
    }

    public function createsm(){

        return view('createsm');

    }
    public function store(SuratMasukRequest $request) {

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
        $input['status_terusan'] = 0;
        $suratmasuk = tbl_surat_masuk::create($input);
        
        return redirect('surat-masuk');
    }

    public function edit(tbl_surat_masuk $suratmasuk) {
        return view('edit', compact('suratmasuk'));
    }
 
    public function update(tbl_surat_masuk $suratmasuk, SuratMasukRequest $request) {

        $input = $request->all();      

        if ($request->hasFile('file')) {
            $exist = Storage::disk('file')->exists($suratmasuk->file);
            if (isset($suratmasuk->file) && $exist) {
                $delete = Storage::disk('file')->delete($suratmasuk->file);
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

        $suratmasuk->update($input);
        return redirect('surat-masuk');
    }

    public function destroy(tbl_surat_masuk $suratmasuk) {

        $exist = Storage::disk('file')->exists($suratmasuk->file);
        if (isset($suratmasuk->file) && $exist) {
            $delete = Storage::disk('file')->delete($suratmasuk->file);
        }
        $suratmasuk->delete();
        return redirect('surat-masuk');
    }

    public function cari(Request $request)
    {
        $kata_kunci     = trim($request->input('kata_kunci'));
        
        if (! empty($kata_kunci)) {
            $id_departement   = $request->input('id_departement');
               
            $query          = tbl_surat_masuk::where('no_surat', 'LIKE', '%'.
            $kata_kunci     . '%');
            (! empty($id_departement)) ? $query
            ->departement($id_departement) : '';
            $suratmasuk_list= $query->paginate(3);

            $pagination = (! empty($id_departement)) ? $pagination     =
            $suratmasuk_list->appends(['id_departement' => $id_departement]) : '';
            $pagination = $suratmasuk_list->appends(['kata_kunci'
            => $kata_kunci]);
            
                $jumlah_suratmasuk   = $suratmasuk_list->total();
                return view('suratmasuk', compact('suratmasuk_list', 
                'kata_kunci', 'pagination', 'jumlah_suratmasuk',
            'id_departement'));
        }

    return redirect('surat-masuk');
    }

    public function insert_terusan(Request $request)
    {
        // dd($request->all());
        if($request->user_id == 'all') {
            $users = User::where('id_departement', auth()->user()->id_departement)
                            ->where('level','user')
                            ->get();

            foreach($users as $user)
            {
                $terusan = Terusan::create([
                    'tbl_surat_masuk_id' => $request->id,
                    'user_id' => $user->id,
                    'tgl_diteruskan' => date('Y-m-d'),
                    'yang_meneruskan' => auth()->user()->name,
                ]);
            }

            tbl_surat_masuk::where('id', $terusan->tbl_surat_masuk_id)->update([
                'status_terusan' => 1
            ]);
    
            return response()->json($terusan);
        } else {
            $terusan = Terusan::create([
                'tbl_surat_masuk_id' => $request->id,
                'user_id' => $request->user_id,
                'tgl_diteruskan' => date('Y-m-d'),
                'yang_meneruskan' => auth()->user()->name,
            ]);
    
            tbl_surat_masuk::where('id', $terusan->tbl_surat_masuk_id)->update([
                'status_terusan' => 1
            ]);
    
            if($terusan) {
                return response()->json($terusan);
            }
        }
    }

    public function get_user_by_departement($id)
    {
        $users = User::where('id_departement', $id)
                            ->where('level', 'operator')
                            ->get();
        return response()->json($users);
    }

    public function status_diterima(Request $request)
    {
        // dd($request->all());
        tbl_surat_keluar::where('id', $request->id)
                        ->update([
                            'status_diterima' => 1
                        ]);

        $tbl_surat_masuk = tbl_surat_masuk::where('id', $request->id_surat_masuk)
                                            ->update([
                                                'tgl_diterima' => date('Y-m-d')
                                            ]);

        return response()->json($tbl_surat_masuk);
    }

    public function simpan_pesan(Request $request)
    {
        $pesan = Disposisi::updateOrCreate(['tbl_surat_masuk_id' => $request->id_tbl_sm],[
            'pesan' => $request->inputisipesan
        ]);

        $sm = tbl_surat_masuk::find($request->id_tbl_sm);
        $sm->proses_disp = $request->status_pesan;
        $sm->save();
        
        return back();
    }

    public function get_disposisi($id)
    {
        $disposisi = Disposisi::where('tbl_surat_masuk_id', $id)->first();
        return response()->json($disposisi);
    }

}
