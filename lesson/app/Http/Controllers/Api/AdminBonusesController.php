<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Reviews;
use App\Models\Bonuses;
use App\Validate;

class AdminBonusesController extends AdminPostsController
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }
    const POST_TYPE = 'bonus';
    const DB_BONUS_CASINO = 'bonus_casino';
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
            $response['body']['bonus_casino'] = self::relative($id, self::DB_BONUS_CASINO, 'casino');
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
        self::updateRelative($data_request['id'], self::DB_BONUS_CASINO, $data_request['bonus_casino']);
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

        if(isset($data['rating'])) {
            $newData['rating'] = (int)$data['rating'];
        }
        else {
            $newData['rating'] = 0;
        }

        return $newData;
    }
    protected static function dataMetaDecode($data){
        $newData = [];
        $newData['bonus'] = htmlspecialchars_decode($data->bonus, ENT_NOQUOTES);
        $newData['bonus_wagering'] = htmlspecialchars_decode($data->bonus_wagering, ENT_NOQUOTES);
        $newData['rating'] = (int)$data->rating;
        return $newData;
    }
}