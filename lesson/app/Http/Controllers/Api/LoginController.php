<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;

class LoginController extends Controller
{
    const TABLE = 'users';
    public function index(Request $request)
    {
        $data = [
            'name' => $request->input('login'),
            'password' => md5($request->input('password'))
        ];
        $res = [
            'confirm' => 'error'
        ];
        if(Users::login($data['name'], $data['password'])) {
            $res['data'] = Users::createToken($data['name'], $data['password']);
            $res['confirm'] = 'ok';
        }

        return response()->json($res);
    }
    public function logout(Request $request)
    {
        /*
        $data = [
            'name' => $request->input('login'),
            'password' => md5($request->input('password'))
        ];
        $res = [
            'confirm' => 'error'
        ];
        if(Users::login($data['name'], $data['password'])) {
            $res['data'] = Users::createToken($data['name'], $data['password']);
            $res['confirm'] = 'ok';
        }

        return response()->json($res);
        */
    }
}
