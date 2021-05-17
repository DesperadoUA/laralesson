<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Reviews;
use App\Validate;

class AdminVendorsController extends AdminPostsController
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }
    const POST_TYPE = 'vendor';
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

        $data_meta = self::dataValidateMetaSave($data_request);
        $post->updateMetaById($data_request['id'], $data_meta);
        return response()->json($response);
    }
    protected static function dataValidateMetaSave($data){
        $newData = [];

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

        return $newData;
    }
    protected static function dataMetaDecode($data){
        $newData = [];
        if(empty($data->faq)) {
            $newData['faq'] = [];
        }
        else {
            $newData['faq'] = json_decode($data->faq, true);;
        }
        $newData['faq_title'] = htmlspecialchars_decode($data->faq_title, ENT_NOQUOTES);

        return $newData;
    }
}
