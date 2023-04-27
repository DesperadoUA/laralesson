<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ForumUsers;
use Illuminate\Support\Str;
use App\Sender;
use App\CardBuilder;

class ForumUserController extends Controller
{
    public function addCandidate(Request $request){
        $res = [
            'confirm' => 'error',
            'error' => []
        ];
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        if(!ForumUsers::checkUniqueEmail($email)) $res['error'][] = "Така поштова скринька вже існує";
        if(!ForumUsers::checkUniqueName($name)) $res['error'][] = "Такий нік зайнятий";

        if(empty($res['error'])) {
            $data = [
                'name' => $name,
                'email' => $email,
                'password' => md5($password),
                'thumbnail' => config('constants.DEFAULT_USER_SRC'),
                'registration_token' => md5(Str::random(10))
            ];
            ForumUsers::insert($data);
            Sender::mailCandidate($data['email'], $data['registration_token']);
            $res['confirm'] = 'ok';
        }
        return response()->json($res);
    }
    public function login(Request $request) {
        $res = [
            'confirm' => 'error',
            'body' => []
        ];
        $email = $request->input('email');
        $password = md5($request->input('password'));
        if(ForumUsers::checkLogin($email, $password)) {
            ForumUsers::setRememberToken($email);
            $res['body'] = CardBuilder::forumUser(ForumUsers::getUserByEmail($email));
            $res['confirm'] = 'ok';
        }
        return response()->json($res);
    }
    public function logout(Request $request) {
        $res = [
            'confirm' => 'ok'
        ];
        $id = $request->input('id');
        $session = $request->input('session');
        ForumUsers::logout($id, $session);
        return response()->json($res);
    }
    public function changePassword(Request $request){
        $res = [
            'confirm' => 'ok'
        ];
        $id = $request->input('id');
        $session = $request->input('session');
        $password = $request->input('password');
        ForumUsers::changePassword($id, $session, $password);
        return response()->json($res);
    }
    public function deleteAccount(Request $request){
        $res = [
            'confirm' => 'ok'
        ];
        $id = $request->input('id');
        $session = $request->input('session');
        ForumUsers::changeStatusCandidate($id, $session);
        return response()->json($res);
    }
    public function checkUser(Request $request) {
        $res = [
            'confirm' => 'error'
        ];
        $data = [
            'id' => $request->input('id'),
            'remember_token' => $request->input('session')
        ];

        if(ForumUsers::checkAuth($data['id'], $data['remember_token'])) {
            $res = [
                'confirm' => 'ok'
            ];
        }
        return response()->json($res);
    }
}
