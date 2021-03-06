<?php

namespace App\Http\Controllers\Api;

use App\Models\Cash;
use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Reviews;
use App\Validate;

class AdminSlotsController extends AdminPostsController
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }
    const POST_TYPE = 'slot';
    const DB_SLOT_CASINO = 'slot_casino';
    const DB_SLOT_VENDOR = 'slot_vendor';
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
        Cash::deleteAll();
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
            $response['body']['slot_casino'] = self::relative($id, self::DB_SLOT_CASINO, 'casino');
            $response['body']['slot_vendor'] = self::relative($id, self::DB_SLOT_VENDOR, 'vendor');
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
        self::updateRelative($data_request['id'], self::DB_SLOT_CASINO, $data_request['slot_casino']);
        self::updateRelative($data_request['id'], self::DB_SLOT_VENDOR, $data_request['slot_vendor']);
        Cash::deleteAll();
        return response()->json($response);
    }
    protected static function dataValidateMetaSave($data){
        $newData = [];
        if(isset($data['rtp'])) {
            $newData['rtp'] = Validate::textValidate($data['rtp']);
        }
        else {
            $newData['rtp'] = '';
        }

        if(isset($data['rating'])) {
            $newData['rating'] = (int)$data['rating'];
        }
        else {
            $newData['rating'] = 0;
        }

        if(isset($data['min_bet'])) {
            $newData['min_bet'] = Validate::textValidate($data['min_bet']);
        }
        else {
            $newData['min_bet'] = '';
        }

        if(isset($data['max_bet'])) {
            $newData['max_bet'] = Validate::textValidate($data['max_bet']);
        }
        else {
            $newData['max_bet'] = '';
        }

        if(isset($data['pay_lines'])) {
            $newData['pay_lines'] = Validate::textValidate($data['pay_lines']);
        }
        else {
            $newData['pay_lines'] = '';
        }

        if(isset($data['reels'])) {
            $newData['reels'] = Validate::textValidate($data['reels']);
        }
        else {
            $newData['reels'] = '';
        }

        if(isset($data['volatility'])) {
            $statusArr = ['high', 'medium', 'low'];
            if(in_array($data['volatility'], $statusArr)) {
                $newData['volatility'] = $data['volatility'];
            } else {
                $newData['volatility'] = 'medium';
            }
        }

        if(isset($data['bonus_rounds'])) {
            $newData['bonus_rounds'] = $data['bonus_rounds'];
        }
        else {
            $newData['bonus_rounds'] = 1;
        }

        if(isset($data['free_spins'])) {
            $newData['free_spins'] = $data['free_spins'];
        }
        else {
            $newData['free_spins'] = 1;
        }

        if(isset($data['scatters'])) {
            $newData['scatters'] = $data['scatters'];
        }
        else {
            $newData['scatters'] = 1;
        }

        if(isset($data['wild_symbol'])) {
            $newData['wild_symbol'] = $data['wild_symbol'];
        }
        else {
            $newData['wild_symbol'] = 1;
        }
        if(isset($data['icon'])) {
            $newData['icon'] = $data['icon'];
        } else {
            $newData['icon'] = '';
        }
        if(isset($data['ref'])) {
            $newData['ref'] = json_encode($data['ref']);
        }
        else {
            $newData['ref'] = json_encode([]);
        }
        if(isset($data['number_rows'])) {
            $newData['number_rows'] = $data['number_rows'];
        }
        else {
            $newData['number_rows'] = '3';
        }
        if(isset($data['type_game'])) {
            if(count($data['type_game']) === 0) $data['type_game'] = ["Slots"];
            $newData['type_game'] = json_encode($data['type_game']);
        }
        else {
            $newData['type_game'] = json_encode(["Slots"]);
        }
        return $newData;
    }
    protected static function dataMetaDecode($data){
        $newData = [];
        $newData['rtp'] = htmlspecialchars_decode($data->rtp);
        $newData['icon'] = $data->icon;
        $newData['rating'] = (int)$data->rating;
        $newData['min_bet'] = htmlspecialchars_decode($data->min_bet);
        $newData['max_bet'] = htmlspecialchars_decode($data->max_bet);
        $newData['pay_lines'] = htmlspecialchars_decode($data->pay_lines);
        $newData['reels'] = htmlspecialchars_decode($data->reels);
        $newData['volatility'] = $data->volatility;
        $newData['bonus_rounds'] = $data->bonus_rounds;
        $newData['free_spins'] = $data->free_spins;
        $newData['scatters'] = $data->scatters;
        $newData['wild_symbol'] = $data->wild_symbol;
        if(isset($data->number_rows)) {
            $newData['number_rows'] = $data->number_rows;
        }
        else {
            $newData['number_rows'] = '3';
        }
        if(empty($data->ref)) {
            $newData['ref'] = [];
        }
        else {
            $newData['ref'] = json_decode($data->ref, true);
        }
        if(empty($data->type_game)) {
            $newData['type_game'] = [
                'current_value' => ["Slots"],
                'all_value' => config('constants.SINGLE_CASINO_GAMES')
            ];
        }
        else {
            $newData['type_game'] = [
                'current_value' => json_decode($data->type_game, true),
                'all_value' => config('constants.SINGLE_CASINO_GAMES')
            ];
        }
        return $newData;
    }
}
