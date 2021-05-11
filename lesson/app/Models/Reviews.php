<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Reviews extends Model
{
    const TABLE = 'reviews';
    const LIMIT = 8;
    const OFFSET = 0;
    const ORDER_BY = 'DESC';
    const ORDER_KEY = 'review_date';
    /*
     *  $settings = [
     *      'limit' => 8,
     *      'offset' => 0,
     *      'order_by' => 'DESC',
     *      'order_key' => 'review_date'
     *  ];
     * */
    static function getPostsByPostId($post_id, $settings = []) {
        $limit     = isset($settings['limit']) ? $settings['limit'] : self::LIMIT;
        $offset    = isset($settings['offset']) ? $settings['offset'] : self::OFFSET;
        $order_by  = isset($settings['order_by']) ? $settings['order_by'] : self::ORDER_BY;
        $order_key = isset($settings['order_key']) ? $settings['order_key'] : self::ORDER_KEY;

        $posts = DB::table(self::TABLE)
            ->where('post_id', '=', $post_id)
            ->offset($offset)
            ->limit($limit)
            ->orderBy($order_key, $order_by)
            ->get();
        return $posts;
    }
}