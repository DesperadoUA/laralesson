<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Reviews;

class AdminCasinoController extends AdminPostsController
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }
    const POST_TYPE = 'casino';
    public function index(Request $request)
    {
        $response = [
            'body' => [],
            'confirm' => 'ok'
        ];
        $posts = new Posts(['post_type' => self::POST_TYPE]);
        $settings = [
            'offset'    => $request->has('offset') ? $request->input('offset') : self::OFFSET,
            'limit'     => $request->has('limit') ? $request->input('limit') : self::LIMIT,
            'order_by'  => $request->has('order_by') ? $request->input('order_by') : self::ORDER_BY,
            'order_key' => $request->has('order_key') ? $request->input('order_key') : self::ORDER_KEY,
            'lang'      => $request->has('lang') ? $request->input('lang') : self::LANG
        ];
        $arrPosts = $posts->getPosts($settings);
        $data = [];
        foreach ($arrPosts as $item) {
            $data[] = self::dataCommonDecode($item) + self::dataMetaDecode($item);
        }
        $response['body'] = $data;
        $response['total'] = $posts->getTotalCountByLang($settings['lang']);
        $response['lang'] = config('constants.LANG')[$settings['lang']];
        return response()->json($response);

    }
    public function store(Request $request) {
        $response = [
            'body' => [],
            'confirm' => 'ok'
        ];
        $data_save = self::dataValidateInsert($request->input('data'));
        $data_meta = self::dataValidateMetaSave($request->input('data'));
        $post = new Posts(['post_type' => self::POST_TYPE]);
        $response['insert_id'] = $post->insert($data_save, $data_meta);
        $response['data_meta'] = $data_meta;
        return response()->json($response);
    }
    public function show($id) {
        $response = [
            'body' => [],
            'confirm' => 'error'
        ];
        $post = new Posts(['post_type' => self::POST_TYPE]);
        $data = $post->getPostById($id);
        if(!empty(count($data))) {
            $response['body'] = self::dataCommonDecode($data[0]) + self::dataMetaDecode($data[0]);
            $response['reviews'] = Reviews::getPostsByPostId($data[0]->id);
            $response['confirm'] = 'ok';
        }
        return response()->json($response);
    }
    public function update(Request $request) {
        $response = [
            'body' => [],
            'confirm' => 'ok'
        ];
        $data_request = $request->input('data');
        $data_save = self::dataValidateSave($data_request['id'], $request->input('data'));
        $post = new Posts(['post_type' => self::POST_TYPE]);
        $post->updateById($data_request['id'], $data_save);

        return response()->json($response);
    }
    protected static function dataValidateMetaSave($data){
        $newData = [];
        if(isset($data['bonuses'])) {
            $newData['bonuses'] = $data['bonuses'];
        }
        else {
            $newData['bonuses'] = '';
        }

        if(isset($data['currency'])) {
            $newData['currency'] = $data['currency'];
        }
        else {
            $newData['currency'] = '';
        }

        if(isset($data['faq'])) {
            $newData['faq'] = $data['faq'];
        }
        else {
            $newData['faq'] = '';
        }

        if(isset($data['faq_title'])) {
            $newData['faq_title'] = $data['faq_title'];
        }
        else {
            $newData['faq_title'] = '';
        }

        if(isset($data['methods_pay'])) {
            $newData['methods_pay'] = $data['methods_pay'];
        }
        else {
            $newData['methods_pay'] = '';
        }

        if(isset($data['methods_payout'])) {
            $newData['methods_payout'] = $data['methods_payout'];
        }
        else {
            $newData['methods_payout'] = '';
        }

        if(isset($data['min_deposit'])) {
            $newData['min_deposit'] = $data['min_deposit'];
        }
        else {
            $newData['min_deposit'] = '';
        }

        if(isset($data['min_payout'])) {
            $newData['min_payout'] = $data['min_payout'];
        }
        else {
            $newData['min_payout'] = '';
        }

        if(isset($data['rating'])) {
            $newData['rating'] = (int)$data['rating'];
        }
        else {
            $newData['rating'] = 0;
        }

        if(isset($data['ref'])) {
            $newData['ref'] = $data['ref'];
        }
        else {
            $newData['ref'] = '';
        }

        if(isset($data['sub_title'])) {
            $newData['sub_title'] = $data['sub_title'];
        }
        else {
            $newData['sub_title'] = '';
        }

        if(isset($data['valuta'])) {
            $newData['valuta'] = $data['valuta'];
        }
        else {
            $newData['valuta'] = '';
        }

        if(isset($data['vendors'])) {
            $newData['vendors'] = $data['vendors'];
        }
        else {
            $newData['vendors'] = '';
        }

        if(isset($data['video_banner'])) {
            $newData['video_banner'] = $data['video_banner'];
        }
        else {
            $newData['video_banner'] = '';
        }

        if(isset($data['video_iframe'])) {
            $newData['video_iframe'] = $data['video_iframe'];
        }
        else {
            $newData['video_iframe'] = '';
        }

        return $newData;
    }
    protected static function dataMetaDecode($data){
        $newData = [];
        $newData['bonuses'] = htmlspecialchars_decode($data->bonuses, ENT_NOQUOTES);
        $newData['currency'] = htmlspecialchars_decode($data->currency, ENT_NOQUOTES);
        $newData['faq'] = htmlspecialchars_decode($data->faq, ENT_NOQUOTES);
        $newData['faq_title'] = htmlspecialchars_decode($data->faq_title, ENT_NOQUOTES);
        $newData['methods_pay'] = htmlspecialchars_decode($data->methods_pay, ENT_NOQUOTES);
        $newData['methods_payout'] = htmlspecialchars_decode($data->methods_payout, ENT_NOQUOTES);
        $newData['min_deposit'] = htmlspecialchars_decode($data->min_deposit, ENT_NOQUOTES);
        $newData['min_payout'] = htmlspecialchars_decode($data->min_payout, ENT_NOQUOTES);
        $newData['rating'] = (int)$data->rating;
        $newData['ref'] = htmlspecialchars_decode($data->ref, ENT_NOQUOTES);
        $newData['sub_title'] = htmlspecialchars_decode($data->sub_title, ENT_NOQUOTES);
        $newData['valuta'] = htmlspecialchars_decode($data->valuta, ENT_NOQUOTES);
        $newData['vendors'] = htmlspecialchars_decode($data->vendors, ENT_NOQUOTES);
        $newData['video_banner'] = htmlspecialchars_decode($data->video_banner, ENT_NOQUOTES);
        $newData['video_iframe'] = htmlspecialchars_decode($data->video_iframe, ENT_NOQUOTES);
        return $newData;
    }
}
