<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Validate;


class AdminCategoryController extends AdminPageController
{
    const POST_TYPE   = 'category';
    const OFFSET      = 0;
    const LIMIT       = 8;
    const ORDER_BY    = 'DESC';
    const ORDER_KEY   = 'create_at';
    const LANG        = 1;
    const DEFAULT_SRC = '/img/default.jpg';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $response = [
            'body' => [],
            'confirm' => 'error'
        ];
        $posts = new Category();
        $settings = [
            'offset'    => $request->has('offset') ? $request->input('offset') : self::OFFSET,
            'limit'     => $request->has('limit') ? $request->input('limit') : self::LIMIT,
            'order_by'  => $request->has('order_by') ? $request->input('order_by') : self::ORDER_BY,
            'order_key' => $request->has('order_key') ? $request->input('order_key') : self::ORDER_KEY,
            'lang'      => $request->has('lang') ? $request->input('lang') : self::LANG
        ];
        $arrPosts = $posts->getPosts($settings);
        if(!$arrPosts->isEmpty()) {
            $data = [];
            foreach ($arrPosts as $item) {
                $data[] = self::dataCommonDecode($item);
            }
            $response['body'] = $data;
            $response['confirm'] = 'ok';
            $response['total'] = $posts->getTotalCountByLang($settings['lang']);
            $response['lang'] = config('constants.LANG')[$settings['lang']];
        }
        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $response = [
            'body' => [],
            'confirm' => 'error'
        ];
        $post = new Category();
        $data = $post->getPostById($id);
        if(!$data->isEmpty()) {
            $response['body'] = self::dataCommonDecode($data[0]);
            $response['body']['relative_category'] = self::relativeCategory($data[0]->id);
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
        $data_save = self::dataValidateSave($request->input('data')) + self::checkParentCategorySave($data_request);
        $post = new Category();
        $post->updateById($data_request['id'], $data_save);
        return response()->json($response);
    }
    protected static function relativeCategory($id) {
        $data = [];
        $post = new Category();
        $current_post = $post->getPostById($id);
        if($current_post->isEmpty()) {
            return $data;
        }
        else {
            $arr_title_category = [];
            $list_category = $post->getAllPostsByLang($current_post[0]->lang);
            if(!$list_category->isEmpty()) {
                foreach ($list_category as $item) $arr_title_category[] = $item->title;
            }
            $data['all_value'] = $arr_title_category;
            $parent_category = $post->getPostById($current_post[0]->parent_id);
            if($parent_category->isEmpty()) $data['current_value'] = [];
            else $data['current_value'][] = $parent_category[0]->title;
            return $data;
        }
    }
    protected static function checkParentCategorySave($data){
        $newData['parent_id'] = 0;
        if(isset($data['parent_id'])) {
            if(!empty($data['parent_id'])){
               $post = new Category();
               $current_post = $post->getPostById($data['id']);
               if(!$current_post->isEmpty()) {
                   $parent_post = $post->getPostByLangTitle($current_post[0]->lang, $data['parent_id'][0]);
                   if(!$parent_post->isEmpty()) {
                       $newData['parent_id'] = $parent_post[0]->id;
                   }
               }
            }
        }
        return $newData;
    }
}
