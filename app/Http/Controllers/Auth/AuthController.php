<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AuthController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = '/admin';
    protected $username = 'username';

    public function __construct()
    {
       
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
                'username'          => 'required|max:20|unique:users',
                'password'          => 'required|confirmed|min:6',
                'name'              => 'required|max:50',
                'nip'               => 'required|max:50',
                'level'             => 'required|in:admin,operator,user'
        ]);
    }

    protected function create(array $data)
    {
        return user::create([
            'username'    => $data['username'],
            'password'    => bcrypt($data['password']),
            'name'        => $data['name'],
            'nip'         => $data['nip'],
            'level'       => $data['username'],
        ]);
    }
}
