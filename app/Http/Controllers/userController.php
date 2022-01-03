<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\User;
use App\departement;
use Illuminate\Support\Facades\Hash;
use Validator;
use Session;

class userController extends Controller
{

    // public function __construct() {
    //     $this->middleware('auth');
    //     $this->middleware('admin');
    // }

    protected function index()
    {
        $user_list = User::orderBy('username','asc')->get();
        $list_departement = departement::all();
        return view('user.index', compact('user_list','list_departement'));
    }

    protected function create()
    {
        $list_departement = departement::all();
        return view('user.create', compact('list_departement'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

            $validasi = Validator::make($data, [
                'username'          => 'required|max:20|unique:users',
                'password'          => 'required|confirmed|min:6',
                'name'              => 'required|max:50',
                'nip'               => 'required|max:50',
                'id_departement'    => 'required|max:11',
                'level'             => 'required|in:admin,operator,user,kepala'
            ]);

            if ($validasi->fails()) {
                return redirect ('user/create')
                        ->withInput()
                        ->withErrors($validasi);
            }

            $data['password'] = bcrypt($data['password']);
            $data['api_token'] = Str::random(60);
            user::create($data);
                return redirect('user');
    }

    public function show($id)
    {
        return redirect('user');
    }

    protected function edit($id)
    {
        $user = user::findOrFail($id);
        $list_departement = departement::all();
        return view('user.edit', compact('user','list_departement'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $user = User::where('id' , $request->id)
                ->update([
                    'username' => $request->username,
                    'password' => Hash::make($request->password),
                    'name' => $request->name,
                    'nip' => $request->nip,
                    'id_departement' => $request->id_departement,
                    'level' => $request->level
        ]);
        $data = $request->all();

        $validasi = Validator::make($data, [
            'username'          => 'required|max:20|unique:users,username,' . $data['id'],
            'password'          => 'sometimes|nullable|confirmed|min:6',
            'name'              => 'required|max:50',
            'nip'               => 'required|max:50',
            'id_departement'    => 'required|max:11',
            'level'             => 'required|in:admin,operator,user,kepala'            
        ]);

        if ($validasi->fails()) {
            return redirect ('user/$id/edit')
                    ->withInput()
                    ->withErrors($validasi);
        }

        if ($request->filled('password')) {
            $data['password'] =bcrypt($data['password']);
        }
        else {
            $data = array_except($data, ['password']);
        }

        // $user->update($data);
        return redirect('user');
    }

    protected function destroy($id)
    {
        $user = user::findOrFail($id);
        $user->delete();
        return redirect('user');
    }

    public function userProfile()
    {
        $user = User::where('id', auth()->user()->id)->first();
        // dd($user);
        return view ('profil.user_profile', compact('user'));
    }

    public function simpan_edit(Request $request) 
    {
        // dd($request->all());
        // dd($request->id);
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $ext  = $file->getClientOriginalExtension();
            if ($request->file('foto')->isValid()) {
                $file_name = date('YmdHis'). ".$ext";
                $upload_path = 'fileupload';
                $request->file('foto')->move($upload_path, $file_name);
                $input['foto'] = $file_name;
            }
        }

        $userdata = User::find($request->id);

        $user = User::updateOrCreate(['id' => $request->id],[
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'alamat' => $request->alamat,
            'ttl' => $request->ttl,
            'telepon' => $request->telepon,
            'jenis_kelamin' => $request->jeniskelamin,
            'foto' => !$request->hasFile('foto') ? $userdata->foto: $input['foto']
        ]);

        return view('profil.user_profile', compact('user'))->with(['message' => 'Success update your profile']);
    }
    
}
