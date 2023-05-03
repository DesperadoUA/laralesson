<?php

namespace App\Http\Controllers\Api;

use App\CardBuilder;
use App\Models\Cash;
use App\Models\Posts;
use App\Models\Pages;
use App\Models\Relative;
use Illuminate\Http\Request;

class VendorController extends PostController
{
    const POST_TYPE = 'vendor';
    const LIMIT_CASINO = 3;
    const CASINO_VENDOR_RELATIVE_DB = 'casino_vendor';
    const SLOT_VENDOR_RELATIVE_DB = 'slot_vendor';

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
            $response['body']['casino'] = [];
            $arr_casino = Relative::getPostIdByRelative(self::CASINO_VENDOR_RELATIVE_DB, $data[0]->id);
            if(!empty($arr_casino)) {
                $casino = new Posts(['post_type'=> 'casino']);
                $arr_posts_casino = CardBuilder::casinoCard($casino->getPublicPostsByArrIdWithRating($arr_casino));
                $response['body']['casino'] = array_slice($arr_posts_casino, 0, self::LIMIT_CASINO);
            }
            $response['body']['slots'] = [];
            $arr_slots = Relative::getPostIdByRelative(self::SLOT_VENDOR_RELATIVE_DB, $data[0]->id);
            if(!empty($arr_slots)) {
                $slots = new Posts(['post_type'=> 'slot']);
                $response['body']['slots'] = CardBuilder::mainSlotCard($slots->getPublicPostsByArrIdWithRating($arr_slots));
            }
            $response['confirm'] = 'ok';
            Cash::store(url()->current(), json_encode($response));
        }
        return response()->json($response);
    }
    protected static function dataMetaDecode($data){
        $newData = [];
        $newData['icon'] = $data->icon;

        return $newData;
    }
}
