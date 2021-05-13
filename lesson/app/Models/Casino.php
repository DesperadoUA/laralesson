<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Casino extends Posts
{
    const POST_TYPE = 'casino';
    const TABLE     = 'casino_meta';
    public static function updateByPostId($parent_id, $data) {
        DB::table(self::TABLE)
            ->where('post_id', $parent_id)
            ->update($data);
    }
}