<?php

namespace App\Http\Controllers\Api;

use App\CardBuilder;
use App\Models\Posts;
use App\Models\Cash;
use Illuminate\Http\Request;


class BlogController extends PostController
{
    const POST_TYPE = 'blog';
    const LIMIT_LAST_POSTS = 5;
    public function index(Request $request)
    {
        $response = [
            'body' => [],
            'confirm' => 'error'
        ];
        $posts = new Posts(['post_type' => self::POST_TYPE]);
        $settings = [
            'offset'    => $request->has('offset') ? $request->input('offset') : self::OFFSET,
            'limit'     => $request->has('limit') ? $request->input('limit') : self::LIMIT,
            'order_by'  => $request->has('order_by') ? $request->input('order_by') : self::ORDER_BY,
            'order_key' => $request->has('order_key') ? $request->input('order_key') : self::ORDER_KEY,
            'lang'      => $request->has('lang') ? $request->input('lang') : self::LANG
        ];
        $data = $posts->getPublicPosts($settings);
        if(!$data->isEmpty()) {
            $arr = [];
            foreach ($data as $item) {
                $arr[] = self::dataCommonDecode($item) + self::dataMetaDecode($item);
            }
            $response = [
                'body' => [
                    'posts' => $arr,
                    'total' =>  $posts->getTotalCountPublicByLang(self::POST_TYPE, $settings['lang'])
                ],
                'confirm' => 'ok'
            ];
        }
        return response()->json($response);
    }
    public function show($id)
    {
        $response = [
            'body' => [],
            'confirm' => 'error'
        ];
        $post = new Posts(['post_type' => self::POST_TYPE]);
        $data = $post->getPublicPostByUrl($id);

        if(!$data->isEmpty()) {
            $response['body'] = $data[0];
            $response['body'] = self::dataCommonDecode($data[0]) + self::dataMetaDecode($data[0]);
            $settings = [
                'lang'      => $data[0]->lang,
                'limit'     => self::LIMIT_LAST_POSTS,
            ];
            $response['body']['posts'] = CardBuilder::newsCard($post->getPublicPosts($settings));
            $response['confirm'] = 'ok';
            Cash::store(url()->current(), json_encode($response));
        }
        return response()->json($response);
    }
    protected static function dataMetaDecode($data){
        $newData = [];
        $newData['author'] = htmlspecialchars_decode($data->author);
        return $newData;
    }
}
