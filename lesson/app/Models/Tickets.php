<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ForumUsers extends Model
{
    const TABLE = 'forum_users';
    static function checkUniqueEmail($email){
        $candidate = DB::table(self::TABLE)
            ->where('email',  $email)
            ->get();
        if($candidate->isEmpty()) return true;
        else return false;
    }
    static function checkUniqueName($name){
        $candidate = DB::table(self::TABLE)
            ->where('name',  $name)
            ->get();
        if($candidate->isEmpty()) return true;
        else return false;
    }
    static function insert($data) {
        DB::table(self::TABLE)->insert($data);
    }
    static function checkCandidate($registration_token) {
        $candidate = DB::table(self::TABLE)
            ->where('registration_token',  $registration_token)
            ->where('role', 'candidate')
            ->get();
        if($candidate->isEmpty()) return false;
        else return true;
    }
    static function addUser($registration_token){
        $data = [
            'role' => 'editor',
            'registration_token' => ''
        ];
        DB::table(self::TABLE)
            ->where('registration_token',  $registration_token)
            ->update($data);
    }
    static function checkLogin($email, $password) {
        $candidate = DB::table(self::TABLE)
            ->where('email',  $email)
            ->where('role', 'editor')
            ->where('password', $password)
            ->get();
        if($candidate->isEmpty()) return false;
        else return true;
    }
    static function checkAuth($id, $remember_token){
        $candidate = DB::table(self::TABLE)
            ->where('id',  $id)
            ->where('role', 'editor')
            ->where('remember_token', $remember_token)
            ->get();
        if($candidate->isEmpty()) return false;
        else return true;
    }
    static function setRememberToken($email) {
        $data = [
            'remember_token' => md5(Str::random(10))
        ];
        DB::table(self::TABLE)
            ->where('email',  $email)
            ->update($data);
    }
    static function logout($id, $session) {
        $data = [
            'remember_token' => ''
        ];
        DB::table(self::TABLE)
            ->where('id',  $id)
            ->where('remember_token',  $session)
            ->update($data);
    }
    static function changePassword($id, $session, $password) {
        $data = [
            'password' => md5($password)
        ];
        DB::table(self::TABLE)
            ->where('id',  $id)
            ->where('remember_token',  $session)
            ->update($data);
    }
    static function changeStatusCandidate($id, $session) {
        $data = [
            'role' => 'candidate',
            'remember_token' => '',
            'registration_token' => ''
        ];
        DB::table(self::TABLE)
            ->where('id',  $id)
            ->where('remember_token',  $session)
            ->update($data);
    }
    static function getUserByEmail($email){
        $candidate = DB::table(self::TABLE)
                        ->where('email',  $email)
                        ->first();
        return $candidate;
    }
}