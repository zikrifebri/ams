<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\tbl_surat_masuk;
use App\tbl_surat_keluar;
use App\departement;
use App\User;
use App\Terusan;

class ApiController extends Controller
{
    public function update(Request $request)
    {
        $token = Str::random(60);

        $request->user()->forceFill([
            'api_token' => hash('sha256', $token),
        ])->save();

        return ['token' => $token];
    }

    public function parse_status($disp)
    {
        switch($disp) {
            case 0:
                return 'Masih dalam proses';
            case 1:
                return 'Diterima';
            case 2:
                return 'Ditolak';
            default:
                return 'Not Found';
        }
    }

    public function get_surat_masuk(Request $request)
    {
        if($request->user_id == null && $request->level == null) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ada!'
            ]);
        } else {
            if($request->level == 'admin') {
                $surat_masuk = tbl_surat_masuk::all();
                $data = array();
                foreach($surat_masuk as $item) {
                    $a['id'] = $item->id;
                    $a['users_id'] = $item->users_id;
                    $a['tbl_surat_keluar_id'] = $item->tbl_surat_keluar_id;
                    $a['no_agenda'] = $item->no_agenda;
                    $a['no_surat'] = $item->no_surat;
                    $a['id_departement'] = $item->departement->nama_departement;
                    $a['asal_departement'] = $item->asal_surat_departement->nama_departement;
                    $a['perihal'] = $item->perihal;
                    $a['kode'] = $item->kode;
                    $a['tgl_surat'] = $item->tgl_surat;
                    $a['tgl_diterima'] = $item->tgl_diterima;
                    $a['proses_disp'] = $this->parse_status($item->proses_disp);
                    $a['keterangan'] = $item->keterangan;
                    $a['file'] = $item->file;
                    $a['status_terusan'] = $item->status_terusan;
                    array_push($data, $a);
                }
            } else if($request->level == 'user') {
                $surat_masuk = tbl_surat_masuk::join('terusans','terusans.tbl_surat_masuk_id','tbl_surat_masuk.id')
                                                ->join('users','users.id','terusans.user_id')
                                                ->where('user_id', $request->user_id)
                                                ->where('level', 'user')
                                                ->get();
                $data = array();
                foreach($surat_masuk as $item) {
                    $a['id'] = $item->id;
                    $a['users_id'] = $item->users_id;
                    $a['tbl_surat_keluar_id'] = $item->tbl_surat_keluar_id;
                    $a['no_agenda'] = $item->no_agenda;
                    $a['no_surat'] = $item->no_surat;
                    $a['id_departement'] = $item->departement->nama_departement;
                    $a['asal_departement'] = $item->asal_surat_departement->nama_departement;
                    $a['perihal'] = $item->perihal;
                    $a['kode'] = $item->kode;
                    $a['tgl_surat'] = $item->tgl_surat;
                    $a['tgl_diterima'] = $item->tgl_diterima;
                    $a['proses_disp'] = $this->parse_status($item->proses_disp);
                    $a['keterangan'] = $item->keterangan;
                    $a['file'] = $item->file;
                    $a['status_terusan'] = $item->status_terusan;
                    array_push($data, $a);
                }
            } else if($request->level == 'operator') {
                $surat_masuk = tbl_surat_masuk::where('tbl_surat_masuk.id_departement', $request->id_departement)
                                                ->get();
                $data = array();
                foreach($surat_masuk as $item) {
                    $a['id'] = $item->id;
                    $a['users_id'] = $item->users_id;
                    $a['tbl_surat_keluar_id'] = $item->tbl_surat_keluar_id;
                    $a['no_agenda'] = $item->no_agenda;
                    $a['no_surat'] = $item->no_surat;
                    $a['id_departement'] = $item->departement->nama_departement;
                    $a['asal_departement'] = $item->asal_surat_departement->nama_departement;
                    $a['perihal'] = $item->perihal;
                    $a['kode'] = $item->kode;
                    $a['tgl_surat'] = $item->tgl_surat;
                    $a['tgl_diterima'] = $item->tgl_diterima;
                    $a['proses_disp'] = $this->parse_status($item->proses_disp);
                    $a['keterangan'] = $item->keterangan;
                    $a['file'] = $item->file;
                    $a['status_terusan'] = $item->status_terusan;
                    array_push($data, $a);
                }
            } else if($request->level == 'kepala') {
                $surat_masuk = tbl_surat_masuk::where('tbl_surat_masuk.id_departement', $request->id_departement)
                                                ->get();
                $data = array();
                foreach($surat_masuk as $item) {
                    $a['id'] = $item->id;
                    $a['users_id'] = $item->users_id;
                    $a['tbl_surat_keluar_id'] = $item->tbl_surat_keluar_id;
                    $a['no_agenda'] = $item->no_agenda;
                    $a['no_surat'] = $item->no_surat;
                    $a['id_departement'] = $item->departement->nama_departement;
                    $a['asal_departement'] = $item->asal_surat_departement->nama_departement;
                    $a['perihal'] = $item->perihal;
                    $a['kode'] = $item->kode;
                    $a['tgl_surat'] = $item->tgl_surat;
                    $a['tgl_diterima'] = $item->tgl_diterima;
                    $a['proses_disp'] = $this->parse_status($item->proses_disp);
                    $a['keterangan'] = $item->keterangan;
                    $a['file'] = $item->file;
                    $a['status_terusan'] = $item->status_terusan;
                    array_push($data, $a);
                }
            }
        }

        return response()->json($data);
    }

    public function get_surat_keluar(Request $request)
    {
        if($request->user_id == null && $request->level == null) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ada!'
            ]);
        } else {
            if($request->level == 'admin') {
                $surat_keluar = tbl_surat_keluar::all();
                $data = array();
                foreach($surat_keluar as $item) {
                    $a['id'] = $item->id;
                    $a['no_agenda'] = $item->no_agenda;
                    $a['id_departement'] = $item->departement->nama_departement;
                    $a['asal_departement'] = $item->asal_surat_departement->nama_departement;
                    $a['no_surat'] = $item->no_surat;
                    $a['perihal'] = $item->perihal;
                    $a['kode'] = $item->kode;
                    $a['tgl_surat'] = $item->tgl_surat;
                    $a['keterangan'] = $item->keterangan;
                    $a['file'] = $item->file;
                    $a['status_diterima'] = $item->status_diterima;
                    array_push($data, $a);
                }
            
            } else if($request->level == 'operator') {
                $surat_keluar = tbl_surat_keluar::where('tbl_surat_keluar.asal_departement', $request->asal_departement)
                                                ->get();
                $data = array();
                foreach($surat_keluar as $item) {
                    $a['id'] = $item->id;
                    $a['no_agenda'] = $item->no_agenda;
                    $a['id_departement'] = $item->departement->nama_departement;
                    $a['asal_departement'] = $item->asal_surat_departement->nama_departement;
                    $a['no_surat'] = $item->no_surat;
                    $a['perihal'] = $item->perihal;
                    $a['kode'] = $item->kode;
                    $a['tgl_surat'] = $item->tgl_surat;
                    $a['keterangan'] = $item->keterangan;
                    $a['file'] = $item->file;
                    $a['status_diterima'] = $item->status_diterima;
                    array_push($data, $a);
                }
            } else if($request->level == 'kepala') {
                $surat_keluar = tbl_surat_keluar::where('tbl_surat_keluar.asal_departement', $request->asal_departement)
                                                ->get();
                $data = array();
                foreach($surat_keluar as $item) {
                    $a['id'] = $item->id;
                    $a['no_agenda'] = $item->no_agenda;
                    $a['id_departement'] = $item->departement->nama_departement;
                    $a['asal_departement'] = $item->asal_surat_departement->nama_departement;
                    $a['no_surat'] = $item->no_surat;
                    $a['perihal'] = $item->perihal;
                    $a['kode'] = $item->kode;
                    $a['tgl_surat'] = $item->tgl_surat;
                    $a['keterangan'] = $item->keterangan;
                    $a['file'] = $item->file;
                    $a['status_diterima'] = $item->status_diterima;
                    array_push($data, $a);
                }
            }
        }

        return response()->json($data);
    }

    public function departement()
    {
        $departement = departement::all();

        return response()->json($departement);
    }

    public function user()
    {
        $user = User::all();

        $data = array();
        foreach($user as $item) {
            $a['id'] = $item->id;
            $a['id_departement'] = $item->departement->nama_departement;
            $a['username'] = $item->username;
            $a['api_token'] = $item->api_token;
            $a['name'] = $item->name;
            $a['nip'] = $item->nip;
            $a['level'] = $item->level;
            $a['email'] = $item->file;
            $a['alamat'] = $item->alamat;
            $a['ttl'] = $item->ttl;
            $a['telepon'] = $item->telepon;
            $a['jenis_kelamin'] = $item->jenis_kelamin;
            $a['foto'] = $item->foto;
            $a['created_at'] = $item->created_at;
            $a['updated_at'] = $item->updated_at;

            array_push($data, $a);
        }
        return response()->json($data);
    }

    public function get_total(Request $request)
    {
        if($request->user_id == null && $request->level == null) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ada!'
            ]);
        } else {
            if ($request->level == 'admin') {
                $jumlah_suratmasuk = tbl_surat_masuk::count();
                $jumlah_suratkeluar = tbl_surat_keluar::count();
                $jumlah_user = user::count();
                $jumlah_departement = departement::count();

                return response()->json([
                    'total_suratmasuk' => $jumlah_suratmasuk,
                    'total_suratkeluar' => $jumlah_suratkeluar,
                    'total_user' => $jumlah_user,
                    'total_departement' => $jumlah_departement
                ]);

            } else if($request->level == 'operator') {
                $jumlah_suratmasuk = tbl_surat_masuk::where('id_departement', $request->id_departement)
                ->count();
                $jumlah_suratkeluar = tbl_surat_keluar::where('asal_departement', $request->id_departement)
                ->count();

                return response()->json([
                    'total_suratmasuk' => $jumlah_suratmasuk,
                    'total_suratkeluar' => $jumlah_suratkeluar,
                    'total_user' => null,
                    'total_departement' => null
                ]);

            } else if($request->level == 'kepala') {
                $jumlah_suratmasuk = tbl_surat_masuk::where('id_departement', $request->id_departement)
                ->count();
                $jumlah_suratkeluar = tbl_surat_keluar::where('asal_departement', $request->id_departement)
                ->count();

                return response()->json([
                    'total_suratmasuk' => $jumlah_suratmasuk,
                    'total_suratkeluar' => $jumlah_suratkeluar,
                    'total_user' => null,
                    'total_departement' => null
                ]);

            }else if($request->level == 'user'){
                $jumlah_suratmasuk = Terusan::where('user_id', $request->user_id)
                ->count();

                return response()->json([
                    'total_suratmasuk' => $jumlah_suratmasuk,
                    'total_suratkeluar' => null,
                    'total_user' => null,
                    'total_departement' => null
                ]);
            }
        }   
    }

    public function login(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'username' => 'required|string',
            'password' => 'required'
        ]);
        if ($validate->fails()) {
            return response()->json([
            'status' => 422,
            'message' => 'Validation errors',
            'error' => $validate->errors(),
        ]);
        }
        $input = $request->all();
        $user = User::where('username', $input["username"])->first();
// dd($user->departement);
        $data = array();
        // foreach($user as $item) {
            $a['id'] = $user->id;
            $a['id_departement'] = $user->id_departement;
            $a['nama_departement'] = $user->departement->nama_departement;
            $a["username"] = $user->username;
            $a["api_token"] = $user->api_token;
            $a["name"] = $user->name;
            $a["nip"] = $user->nip;
            $a["level"] = $user->level;
            $a["email"] = $user->email;
            $a["alamat"] = $user->alamat;
            $a["ttl"] = $user->ttl;
            $a["telepon"] = $user->telepon;
            $a["jenis_kelamin"] = $user->jenis_kelamin;
            $a["foto"] = $user->foto;
            $a["created_at"] = $user->created_at;
            $a["updated_at"] = $user->updated_at;

            array_push($data, $a);
        // }
        if ($user) {
            if (Hash::check($input['password'], $user->password)) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Login Berhasil',
                    'data' => $a
                ]);
            } else {
                return response()->json([
                    'status' => 401,
                    'message' => 'Username or password is wrong',
                ]);
            }
        } else {
            return response()->json([
                'status' => 404,
                'message' => "Users not found",
            ]);
        }
    }
}




