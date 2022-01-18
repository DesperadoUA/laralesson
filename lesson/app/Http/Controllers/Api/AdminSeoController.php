<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cash;
use App\Models\Posts;
use Illuminate\Http\Request;
use App\CardBuilder;
use Illuminate\Support\Facades\DB;

class AdminSeoController extends Controller
{
    const LANG = 1;
    const DEFAULT_POST_TYPE = 'casino';
    const POST_TABLE = 'posts';
    const DEFAULT_FILTER = 'create_at';
    const ORDER_BY  = 'DESC';
    public function index(Request $request)
    {
        $response = [
            'body' => [],
            'confirm' => 'error'
        ];
        $lang = $request->has('lang') ? $request->input('lang') : self::LANG;
        $post_type = $request->has('postType') ? $request->input('postType') : self::DEFAULT_POST_TYPE;
        $posts = new Posts(['post_type' => $post_type]);
        $data = $posts->getPosts(['post_type' => $post_type, 'lang' => $lang, 'limit' => 10000]);
        if(!$data->isEmpty()) {
            $response['body']['posts'] = CardBuilder::seoAdminCard($data);
            $response['confirm'] = 'ok';
        }
        return response()->json($response);
    }
    public function update(Request $request) {
        $posts = $request->has('posts') ? $request->input('posts') : [];
        $postType = $request->has('postType') ? $request->input('postType') : '';
        $response = [
            'body' => [],
            'confirm' => 'error'
        ];
        if(!empty($postType)) {
            foreach ($posts as $item) {
                $common_data = [
                    'meta_title' => empty($item['meta_title']) ? '' : $item['meta_title'],
                    'description' => empty($item['description']) ? '' : $item['description'],
                    'status' => $item['status']
                ];
                $meta_data = [];
                if(isset($item['ref'])) {
                    $meta_data['ref'] = json_encode($item['ref']);
                }
                if(isset($item['rating'])) {
                    $meta_data['rating'] = (int)$item['rating'];
                }
                DB::table(self::POST_TABLE)
                    ->where('id', $item['id'])
                    ->update($common_data);

                if(!empty(array_keys($meta_data))) {
                    DB::table($postType.'_meta')
                        ->where('post_id', $item['id'])
                        ->update($meta_data);
                }
            }
            $response['confirm'] = 'ok';
        }
        Cash::deleteAll();
        return response()->json($response);
    }
    public function postTypes(){
        $response = [
            'body' => [],
            'confirm' => 'error'
        ];
        $post_types = Posts::distinct()->get(['post_type']);
        if(!$post_types->isEmpty()) {
            $list = [];
            foreach ($post_types as $item) $list[] = $item->post_type;
            $response['body']['post_types'] = $list;
            $response['confirm'] = 'ok';
        }
        return response()->json($response);
    }
    public function filters(Request $request){
        $response = [
            'body' => [],
            'confirm' => 'ok'
        ];
        $lang = $request->has('lang') ? $request->input('lang') : self::LANG;
        $post_type = $request->has('postType') ? $request->input('postType') : self::DEFAULT_POST_TYPE;
        $filter = $request->has('filter') ? $request->input('filter') : self::DEFAULT_FILTER;
        $order = $request->has('filterValue') ? $request->input('filterValue') : self::ORDER_BY;
        $posts = new Posts(['post_type' => $post_type]);
        if($order === 'hide') {
            $data = $posts->getHidePosts([
                'lang' => $lang,
                'limit' => 10000]);
        }
        elseif($order === 'public') {
            $data = $posts->getPublicPosts([
                'lang' => $lang,
                'limit' => 10000]);
        } else {
            $data = $posts->getPosts([
                'lang' => $lang,
                'order_key' => $filter,
                'order_by' => $order,
                'limit' => 10000]
            );
        }


        if(!$data->isEmpty()) {
            $response['body']['posts'] = CardBuilder::seoAdminCard($data);
            $response['confirm'] = 'ok';
        }
        return response()->json($response);
    }
}
