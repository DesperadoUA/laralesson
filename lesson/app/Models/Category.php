<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    const LIMIT       = 8;
    const OFFSET      = 0;
    const TABLE       = 'category';
    const ORDER_BY    = 'DESC';
    const ORDER_KEY   = 'create_at';
    const LANG        = 1;
    const RELATIVE_DB = 'post_category';
    const POSTS_DB    = 'posts';

    public function getPublicPosts($settings = []) {
        $limit     = isset($settings['limit']) ? $settings['limit'] : self::LIMIT;
        $offset    = isset($settings['offset']) ? $settings['offset'] : self::OFFSET;
        $order_by  = isset($settings['order_by']) ? $settings['order_by'] : self::ORDER_BY;
        $order_key = isset($settings['order_key']) ? $settings['order_key'] : self::ORDER_KEY;
        $lang      = isset($settings['lang']) ? $settings['lang'] : self::LANG;

        $posts = DB::table(self::TABLE)
            ->where('status',  'public')
            ->where('lang', $lang)
            ->select( '*')
            ->offset($offset)
            ->limit($limit)
            ->orderBy($order_key, $order_by)
            ->get();
        return $posts;
    }
    public function getPublicPostByUrl($url) {
        $post = DB::table(self::TABLE)
            ->where('permalink', $url)
            ->where('status','public')
            ->select( '*')
            ->get();
        return $post;
    }
    public function getPosts($settings = []) {
        $limit     = isset($settings['limit']) ? $settings['limit'] : self::LIMIT;
        $offset    = isset($settings['offset']) ? $settings['offset'] : self::OFFSET;
        $order_by  = isset($settings['order_by']) ? $settings['order_by'] : self::ORDER_BY;
        $order_key = isset($settings['order_key']) ? $settings['order_key'] : self::ORDER_KEY;
        $lang      = isset($settings['lang']) ? $settings['lang'] : self::LANG;

        $posts = DB::table(self::TABLE)
            ->where('lang', $lang)
            ->select( '*')
            ->offset($offset)
            ->limit($limit)
            ->orderBy($order_key, $order_by)
            ->get();
        return $posts;
    }
    public function getPostById($id) {
        $posts = DB::table(self::TABLE)
            ->where('id', $id)
            ->select( '*')
            ->get();
        return $posts;
    }
    public function updateById($id, $data) {
        DB::table(self::TABLE)
            ->where('id', $id)
            ->update($data);
    }
    public function getPostByUrl($url) {
        $post = DB::table(self::TABLE)
            ->where('permalink', $url)
            ->select( '*')
            ->get();
        return $post;
    }
    public function getTotalCountByLang($lang) {
        return  DB::table(self::TABLE)
            ->where('lang', $lang)
            ->count();
    }
    public function getAllPostsByLang($lang) {
        return  DB::table(self::TABLE)
                    ->where('lang', $lang)
                    ->get();
    }
    public function getPostByLangTitle($lang, $title) {
        return  DB::table(self::TABLE)
            ->where('lang', $lang)
            ->where('title', $title)
            ->get();
    }
    public function getChildPublicCategory($parent_id){
        $post = DB::table(self::TABLE)
            ->where('parent_id', $parent_id)
            ->select( '*')
            ->get();
        return $post;
    }
    public function getPublicPostsFromCategory($cat_id){
        $t1 = self::RELATIVE_DB;
        $t2 = self::POSTS_DB;
        $post = DB::table($t1)
            ->where($t1.'.relative_id', $cat_id)
            ->join($t2, function($join) {
                $join->on('id', '=', 'post_id')
                    ->where('status', '=', 'public');
            })
            ->select( $t2.'.*')
            ->orderBy(self::ORDER_KEY, self::ORDER_BY)
            ->get();
        return $post;
    }
}