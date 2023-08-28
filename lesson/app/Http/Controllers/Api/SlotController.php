<?php

namespace App\Http\Controllers\Api;

use App\CardBuilder;
use App\Models\Cash;
use App\Models\Posts;
use App\Models\Pages;
use App\Models\Relative;
use App\Models\Category;
use Illuminate\Http\Request;

class SlotController extends PostController
{
    const POST_TYPE = 'slot';
    const LIMIT     = 10;
    const SLOT_VENDOR_RELATIVE_DB = 'slot_vendor';
    const SLOT_CASINO_RELATIVE_DB = 'slot_casino';
    const POPULAR_CASINO = 3;
    const LIMIT_SLOTS = 1000;

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
            $response['body']['vendors'] = [];
            $arr_vendors = Relative::getRelativeByPostId(self::SLOT_VENDOR_RELATIVE_DB, $data[0]->id);
            if(!empty($arr_vendors)) {
                $vendors = new Posts(['post_type'=> 'vendor']);
                $response['body']['vendors'] = CardBuilder::vendorCard($vendors->getPublicPostsByArrId($arr_vendors));
            }

            $response['body']['casino'] = [];
            $arr_casino = Relative::getRelativeByPostId(self::SLOT_CASINO_RELATIVE_DB, $data[0]->id);
            $casino = new Posts(['post_type'=> 'casino']);
            if(!empty($arr_casino)) {
                $response['body']['casino'] = CardBuilder::casinoCard($casino->getPublicPostsByArrId($arr_casino));
            }
            $settings = [
                'lang'      => $data[0]->lang,
                'limit'     => self::POPULAR_CASINO,
                'order_key' => 'rating'
            ];
            $response['body']['popular_casino'] = CardBuilder::casinoCard($casino->getPublicPosts($settings));
            $response['confirm'] = 'ok';
            Cash::store(url()->current(), json_encode($response));
        }
        return response()->json($response);
    }
    protected static function dataMetaDecode($data){
        $newData = [];
        $newData['rating'] = (int)$data->rating;
        $newData['icon'] = $data->icon;
        $newData['min_bet'] = htmlspecialchars_decode($data->min_bet);
        $newData['max_bet'] = htmlspecialchars_decode($data->max_bet);
        $newData['pay_lines'] = htmlspecialchars_decode($data->pay_lines);
        $newData['reels'] = htmlspecialchars_decode($data->reels);
        $newData['volatility'] = htmlspecialchars_decode($data->volatility);
        $newData['bonus_rounds'] = htmlspecialchars_decode($data->bonus_rounds);
        $newData['free_spins'] = htmlspecialchars_decode($data->free_spins);
        $newData['scatters'] = htmlspecialchars_decode($data->scatters);
        $newData['wild_symbol'] = htmlspecialchars_decode($data->wild_symbol);
        $newData['rtp'] = $data->rtp;
        if(empty($data->ref)) {
            $newData['ref'] = [];
        }
        else {
            $newData['ref'] = json_decode($data->ref, true);
        }
        $newData['number_rows'] = htmlspecialchars_decode($data->number_rows);
        if(empty($data->type_game)) {
            $newData['type_game'] = ['Slots'];
        }
        else {
            $newData['type_game'] = json_decode($data->type_game, true);
        }

        return $newData;
    }
    
    public function search(Request $request) {
        $response = [
            'body' => [],
            'confirm' => 'ok'
        ];
        $postType = $request->input('postType');
        $postUrl = $request->input('postUrl');
        $slotsModel = new Posts(['post_type' => self::POST_TYPE]);
        if($postType === 'page') {
            if($postUrl === 'slots') {
                $settings = [
                    'lang'      => self::LANG,
                    'limit'     => self::LIMIT_SLOTS,
                    'order_key' => 'rating'
                ];
            }
            $response['body']['posts'] = CardBuilder::mainSlotCard($slotsModel->getPublicPosts($settings));
        }
        else if($postType === 'category') {
            $category = new Category();
            $data = $category->getPublicPostByUrl($postUrl);
            if(!$data->isEmpty()) {
                $relative_posts = $category->getPublicPostsFromCategory($data[0]->id);
                $arr_id = [];
                foreach ($relative_posts as $item ) $arr_id[] = $item->id;
                $response['body']['posts'] = CardBuilder::mainSlotCard($slotsModel->getPublicPostsByArrIdWithRating($arr_id));
            }
        }
        else {
            $configPostTypes = [
                'vendor' => [
                    'table' => 'vendor',
                    'relative' => self::SLOT_VENDOR_RELATIVE_DB
                ]
            ];
            $post = new Posts(['post_type' => $configPostTypes[$postType]['table']]);
            $data = $post->getPublicPostByUrl($postUrl);
            if(!$data->isEmpty()) {
                $arr_casino = Relative::getPostIdByRelative($configPostTypes[$postType]['relative'], $data[0]->id);
                $response['body']['posts'] = CardBuilder::mainSlotCard($slotsModel->getPublicPostsByArrIdWithRating($arr_casino));
            }
        }
        return response()->json($response);
    }
}
