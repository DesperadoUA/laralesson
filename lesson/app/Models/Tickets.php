<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Tickets extends Model
{
    const TABLE = 'tickets';
    static function insert($data) {
        DB::table(self::TABLE)->insert($data);
    }
    static function getTicketsByUserId($user_id) {
        $posts = DB::table(self::TABLE)
            ->where('forum_user_id',  $user_id)
            ->orderBy('created_at', 'DESC')
            ->get();
        if($posts->isEmpty()) return [];
        else return $posts;
    }
}