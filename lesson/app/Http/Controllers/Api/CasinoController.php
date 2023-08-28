<?php

namespace App\Http\Controllers\Api;

use App\CardBuilder;
use App\Models\Cash;
use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Pages;
use App\Models\Relative;

class CasinoController extends PostController
{
    const POST_TYPE = 'casino';
    const OFFSET    = 0;
    const LIMIT     = 8;
    const SLOT_LIMIT = 9;
    const ORDER_BY  = 'DESC';
    const ORDER_KEY = 'create_at';
    const LANG      = 1;
    const POPULAR_CASINO = 3;
    const CASINO_VENDOR_RELATIVE_DB = 'casino_vendor';
    const CASINO_PAYMENT_RELATIVE_DB = 'casino_payment';
    const SLOTS_CASINO_RELATIVE_DB = 'slot_casino';
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
        $post = new Posts(['post_type' => self::POST_TYPE]);
        $data = $post->getPublicPostByUrl($id);
        if(!$data->isEmpty()) {
            $response['body'] = $data[0];
            $response['body'] = self::dataCommonDecode($data[0]) + self::dataMetaDecode($data[0]);
            $pageModel = new Pages();
            $autorPage = $pageModel->getPublicPostByUrl(config('constants.PAGES.AUTHOR'));
            $response['body']['author_name'] = $autorPage[0]->h1; 
            $response['body']['vendors'] = [];
            $arr_vendors = Relative::getRelativeByPostId(self::CASINO_VENDOR_RELATIVE_DB, $data[0]->id);
            if(!empty($arr_vendors)) {
                $vendors = new Posts(['post_type'=> 'vendor']);
                $response['body']['vendors'] = CardBuilder::vendorCard($vendors->getPublicPostsByArrId($arr_vendors));
            }
            $response['body']['payments'] = [];
            $arr_payments = Relative::getRelativeByPostId(self::CASINO_PAYMENT_RELATIVE_DB, $data[0]->id);
            if(!empty($arr_payments)) {
                $payment = new Posts(['post_type'=> 'payment']);
                $response['body']['payments'] = CardBuilder::paymentCard($payment->getPublicPostsByArrId($arr_payments));
            }
            $response['body']['slots'] = [];
            $arr_slots = Relative::getPostIdByRelative(self::SLOTS_CASINO_RELATIVE_DB, $data[0]->id);
            $slots = new Posts(['post_type'=> 'slot']);
            $response['body']['slots'] = CardBuilder::slotCard($slots->getPublicPostsByArrIdWithRating($arr_slots));
            $response['body']['slots'] = array_slice($response['body']['slots'], 0, self::SLOT_LIMIT);
            $casino = new Posts(['post_type'=> 'casino']);
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
        $newData['icon'] = $data->icon;
        $newData['bonus'] = htmlspecialchars_decode($data->bonus);
        $newData['license'] = htmlspecialchars_decode($data->license);
        $newData['bonus_wagering'] = htmlspecialchars_decode($data->bonus_wagering);
        $newData['freespins'] = htmlspecialchars_decode($data->freespins);
        $newData['freespins_wagering'] = htmlspecialchars_decode($data->freespins_wagering);
        if(empty($data->faq)) {
            $newData['faq'] = [];
        }
        else {
            $newData['faq'] = json_decode($data->faq, true);
        }
        $newData['faq_title'] = htmlspecialchars_decode($data->faq_title);
        $newData['methods_pay'] = htmlspecialchars_decode($data->methods_pay);
        $newData['methods_payout'] = htmlspecialchars_decode($data->methods_payout);
        $newData['min_deposit'] = htmlspecialchars_decode($data->min_deposit);
        $newData['min_payout'] = htmlspecialchars_decode($data->min_payout);
        $newData['rating'] = (int)$data->rating;
        $newData['close'] = (int)$data->close;
        $newData['promocod'] = $data->promocod;
        if(empty($data->ref)) {
            $newData['ref'] = [];
        }
        else {
            $newData['ref'] = json_decode($data->ref, true);
        }
        $newData['regular_offers'] = $data->regular_offers;
        $newData['live_chat'] = $data->live_chat;
        $newData['live_casino'] = $data->live_casino;
        $newData['vip_program'] = $data->vip_program;
        if(empty($data->details)) {
            $newData['details'] = [];
        }
        else {
            $newData['details'] = json_decode($data->details, true);
        }
        if(empty($data->type_games)) {
            $newData['type_games'] = [];
        }
        else {
            $newData['type_games'] = json_decode($data->type_games, true);
        }
        return $newData;
    }
    
}
