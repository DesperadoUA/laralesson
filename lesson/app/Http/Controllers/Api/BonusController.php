<?php

namespace App\Http\Controllers\Api;

use App\CardBuilder;
use App\Models\Cash;
use App\Models\Posts;
use App\Models\Pages;
use Illuminate\Http\Request;


class BonusController extends PostController
{
    const POST_TYPE = 'bonus';
    const BONUSES_LIMIT = 1000;

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
            $pageModel = new Pages();
            $autorPage = $pageModel->getPublicPostByUrl(config('constants.PAGES.AUTHOR'));
            $response['body']['author_name'] = $autorPage[0]->h1; 
            $response['body']['card'] = CardBuilder::bonusCard($data)[0];
            $response['confirm'] = 'ok';
            Cash::store(url()->current(), json_encode($response));
        }
        return response()->json($response);
    }
    protected static function dataMetaDecode($data){
        $newData = [];
        $newData['bonus'] = htmlspecialchars_decode($data->bonus);
        $newData['bonus_wagering'] = htmlspecialchars_decode($data->bonus_wagering);
        $newData['rating'] = (int)$data->rating;
        $newData['show_on_main'] = (int)$data->show_on_main;
        $newData['close'] = (int)$data->close;

        return $newData;
    }
    public function search(Request $request) {
        $response = [
            'body' => [],
            'confirm' => 'ok'
        ];
        $postType = $request->input('postType');
        $postUrl = $request->input('postUrl');
        $bonusModel = new Posts(['post_type' => self::POST_TYPE]);
        if($postType === 'page') {
            if($postUrl === 'bonuses') {
                $settings = [
                    'lang'      => self::LANG,
                    'limit'     => self::BONUSES_LIMIT,
                    'order_key' => 'rating'
                ];
            }
            $response['body']['posts'] = CardBuilder::bonusCard($bonusModel->getPublicPosts($settings));
        }
        else if($postType === 'category') {
        }
        else {
        }
        return response()->json($response);
    }
}
