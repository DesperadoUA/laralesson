<?php

namespace App\Http\Controllers\Api;

use App\Models\Posts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pages;
use App\CardBuilder;

class PageController extends Controller
{
    const POST_TYPE = 'page';
    const OFFSET    = 0;
    const LIMIT     = 8;
    const MAIN_PAGE_LIMIT_CASINO = 1000;
    const LIMIT_POPULAR_SLOTS = 4;
    const LIMIT_POPULAR_BONUS = 4;
    const LIMIT_NEW_CASINO = 4;
    const ORDER_BY  = 'DESC';
    const ORDER_KEY = 'create_at';
    const LANG      = 1;
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
        /*
        $posts = new Pages();
        $settings = [
            'offset'    => $request->has('offset') ? $request->input('offset') : self::OFFSET,
            'limit'     => $request->has('limit') ? $request->input('limit') : self::LIMIT,
            'order_by'  => $request->has('order_by') ? $request->input('order_by') : self::ORDER_BY,
            'order_key' => $request->has('order_key') ? $request->input('order_key') : self::ORDER_KEY,
            'lang'      => $request->has('lang') ? $request->input('lang') : self::LANG
        ];
        $data = $posts->getPublicPosts($settings);
        if(!$data->isEmpty()) {
            $response['body'] = $data;
            $response['confirm'] = 'ok';
        }
        */
        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function main()
    {
        $id = '/';
        $response = [
            'body' => [],
            'confirm' => 'error'
        ];
        $post = new Pages();
        $data = $post->getPublicPostByUrl($id);
        if(!$data->isEmpty()) {
            $bonus = new Posts(['post_type' => 'bonus']);
            $casino = new Posts(['post_type' => 'casino']);
            $slot = new Posts(['post_type' => 'slot']);

            $response['body'] = self::dataMetaDecode($data[0]);
            $response['body']['bonuses'] = CardBuilder::bonusCard($bonus->getBonusMainPage($data[0]->lang));
            $settings = [
                'lang'      => $data[0]->lang,
                'limit'     => self::LIMIT_POPULAR_BONUS,
                'order_key' => 'rating'
            ];
            $response['body']['popular_bonus'] = CardBuilder::bonusCard($bonus->getPublicPosts($settings));
            $settings = [
                'lang'      => $data[0]->lang,
                'limit'     => self::MAIN_PAGE_LIMIT_CASINO,
                'order_key' => 'rating'
            ];
            $response['body']['casino'] = CardBuilder::casinoCard($casino->getPublicPosts($settings));
            $settings = [
                'lang'      => $data[0]->lang,
                'limit'     => self::LIMIT_POPULAR_SLOTS,
                'order_key' => 'rating'
            ];
            $response['body']['popular_slots'] = CardBuilder::slotCard($slot->getPublicPosts($settings));
            $settings = [
                'lang'      => $data[0]->lang,
                'limit'     => self::LIMIT_NEW_CASINO
            ];
            $response['body']['new_casino'] = CardBuilder::casinoCard($casino->getPublicPosts($settings));
            $response['confirm'] = 'ok';
        }
        return response()->json($response);
    }
    public function casino() {
        $response = [
            'body' => [],
            'confirm' => 'error'
        ];
        $post = new Pages();
        $data = $post->getPublicPostByUrl('casino');
        if(!$data->isEmpty()) {
            $response['body'] = self::dataMetaDecode($data[0]);
            $response['confirm'] = 'ok';
        }
        return response()->json($response);
    }
    protected static function dataMetaDecode($data){
        $newData = [];
        $newData['title'] = htmlspecialchars_decode($data->title, ENT_NOQUOTES);
        $newData['short_desc'] = htmlspecialchars_decode($data->short_desc, ENT_NOQUOTES);
        $newData['h1'] = htmlspecialchars_decode($data->h1, ENT_NOQUOTES);
        $newData['meta_title'] = htmlspecialchars_decode($data->meta_title, ENT_NOQUOTES);
        $newData['description'] = htmlspecialchars_decode($data->description, ENT_NOQUOTES);
        $newData['keywords'] = htmlspecialchars_decode($data->keywords, ENT_NOQUOTES);
        $newData['content'] = htmlspecialchars_decode($data->content, ENT_NOQUOTES);
        return $newData;
    }
}



