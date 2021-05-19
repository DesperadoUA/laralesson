<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Reviews;
use App\Models\Casino;
use App\Validate;

class AdminCasinoController extends AdminPostsController
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }
    const POST_TYPE = 'casino';
    const DB_CASINO_VENDOR = 'casino_vendor';
    const DB_CASINO_PAYMENT = 'casino_payment';
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
            $response['body']['category'] = self::relativeCategory($id);
            $response['body']['casino_vendor'] = self::relative($id, self::DB_CASINO_VENDOR, 'vendor');
            $response['body']['casino_payment'] = self::relative($id, self::DB_CASINO_PAYMENT, 'payment');
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

        $data_meta = self::dataValidateMetaSave($data_request);
        $post->updateMetaById($data_request['id'], $data_meta);

        self::updateCategory($data_request['id'], $data_request['category']);
        self::updateRelative($data_request['id'], self::DB_CASINO_VENDOR, $data_request['casino_vendor']);
        self::updateRelative($data_request['id'], self::DB_CASINO_PAYMENT, $data_request['casino_payment']);
        return response()->json($response);
    }
    protected static function dataValidateMetaSave($data){
        $newData = [];
        if(isset($data['bonus'])) {
            $newData['bonus'] = Validate::textValidate($data['bonus']);
        }
        else {
            $newData['bonus'] = '';
        }

        if(isset($data['bonus_wagering'])) {
            $newData['bonus_wagering'] = Validate::textValidate($data['bonus_wagering']);
        }
        else {
            $newData['bonus_wagering'] = '';
        }

        if(isset($data['freespins'])) {
            $newData['freespins'] = Validate::textValidate($data['freespins']);
        }
        else {
            $newData['freespins'] = '';
        }

        if(isset($data['freespins_wagering'])) {
            $newData['freespins_wagering'] = Validate::textValidate($data['freespins_wagering']);
        }
        else {
            $newData['freespins_wagering'] = '';
        }

        if(isset($data['currency'])) {
            $newData['currency'] = $data['currency'];
        }
        else {
            $newData['currency'] = '';
        }

        if(isset($data['faq'])) {
            $newData['faq'] = json_encode($data['faq']);
        }
        else {
            $newData['faq'] = json_encode([]);
        }

        if(isset($data['faq_title'])) {
            $newData['faq_title'] = Validate::textValidate($data['faq_title']);
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
            $newData['ref'] = json_encode($data['ref']);
        }
        else {
            $newData['ref'] = json_encode([]);
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

        if(isset($data['regular_offers'])) {
            $newData['regular_offers'] = $data['regular_offers'];
        }
        else {
            $newData['regular_offers'] = 1;
        }

        if(isset($data['live_chat'])) {
            $newData['live_chat'] = $data['live_chat'];
        }
        else {
            $newData['live_chat'] = 1;
        }

        if(isset($data['live_casino'])) {
            $newData['live_casino'] = $data['live_casino'];
        }
        else {
            $newData['live_casino'] = 1;
        }

        if(isset($data['vip_program'])) {
            $newData['vip_program'] = $data['vip_program'];
        }
        else {
            $newData['vip_program'] = 1;
        }

        return $newData;
    }
    protected static function dataMetaDecode($data){
        $newData = [];
        $newData['bonus'] = htmlspecialchars_decode($data->bonus, ENT_NOQUOTES);
        $newData['bonus_wagering'] = htmlspecialchars_decode($data->bonus_wagering, ENT_NOQUOTES);
        $newData['freespins'] = htmlspecialchars_decode($data->freespins, ENT_NOQUOTES);
        $newData['freespins_wagering'] = htmlspecialchars_decode($data->freespins_wagering, ENT_NOQUOTES);
        $newData['currency'] = htmlspecialchars_decode($data->currency, ENT_NOQUOTES);
        if(empty($data->faq)) {
            $newData['faq'] = [];
        }
        else {
            $newData['faq'] = json_decode($data->faq, true);;
        }
        $newData['faq_title'] = htmlspecialchars_decode($data->faq_title, ENT_NOQUOTES);
        $newData['methods_pay'] = htmlspecialchars_decode($data->methods_pay, ENT_NOQUOTES);
        $newData['methods_payout'] = htmlspecialchars_decode($data->methods_payout, ENT_NOQUOTES);
        $newData['min_deposit'] = htmlspecialchars_decode($data->min_deposit, ENT_NOQUOTES);
        $newData['min_payout'] = htmlspecialchars_decode($data->min_payout, ENT_NOQUOTES);
        $newData['rating'] = (int)$data->rating;
        if(empty($data->ref)) {
            $newData['ref'] = [];
        }
        else {
            $newData['ref'] = json_decode($data->ref, true);;
        }
        $newData['sub_title'] = htmlspecialchars_decode($data->sub_title, ENT_NOQUOTES);
        $newData['valuta'] = htmlspecialchars_decode($data->valuta, ENT_NOQUOTES);
        $newData['vendors'] = htmlspecialchars_decode($data->vendors, ENT_NOQUOTES);
        $newData['video_banner'] = htmlspecialchars_decode($data->video_banner, ENT_NOQUOTES);
        $newData['video_iframe'] = htmlspecialchars_decode($data->video_iframe, ENT_NOQUOTES);
        $newData['regular_offers'] = $data->regular_offers;
        $newData['live_chat'] = $data->live_chat;
        $newData['live_casino'] = $data->live_casino;
        $newData['vip_program'] = $data->vip_program;
        return $newData;
    }
}
