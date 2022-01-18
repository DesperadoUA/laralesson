<?php

namespace App\Http\Controllers\Api;

use App\Models\Cash;
use App\Models\Posts;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\CardBuilder;

class CategoryController extends Controller
{
    const POST_TYPE = 'category';
    const CATEGORY_LIMIT_SLOT = 1000;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function casino() {
        $response = [
            'body' => [],
            'confirm' => 'error',
            'category' => 'casino'
        ];
        /*
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
        }*/
        return response()->json($response);
    }
    public function slots() {
        $response = [
            'body' => [],
            'confirm' => 'error',
        ];
        $category = new Category();
        $data = $category->getPublicPostByUrl(config('constants.CATEGORY.SLOTS'));
        $response['body']['category_link'] = [];
        if(!$data->isEmpty()) {
            $response['body'] = self::dataMetaDecode($data[0]);
            $response['body']['category_link'] = CardBuilder::categoryLinks($category->getChildPublicCategory($data[0]->id));

            $relative_slots = $category->getPublicPostsFromCategory($data[0]->id);
            $arr_id = [];
            foreach ($relative_slots as $item ) $arr_id[] = $item->id;
            $slots = new Posts(['post_type' => 'slot']);
            $response['body']['slots'] = CardBuilder::mainSlotCard($slots->getPublicPostsByArrIdWithRating($arr_id));
            $response['confirm'] = 'ok';
            Cash::store(url()->current(), json_encode($response));
        }
        return response()->json($response);
    }
    public function popularCasino() {
        $response = self::dataForCasinoCategory(config('constants.CATEGORY.POPULAR_CASINO'));
        return response()->json($response);
    }
    public function licensedCasino() {
        $response = self::dataForCasinoCategory(config('constants.CATEGORY.LICENSED_CASINO'));
        return response()->json($response);
    }
    public function minDepositCasino() {
        $response = self::dataForCasinoCategory(config('constants.CATEGORY.MIN_DEPOSIT_CASINO'));
        return response()->json($response);
    }
    public function maxPayoutCasino() {
        $response = self::dataForCasinoCategory(config('constants.CATEGORY.MAX_PAY_OUT_CASINO'));
        return response()->json($response);
    }
    public function freeBonusCasino() {
        $response = self::dataForCasinoCategory(config('constants.CATEGORY.FREE_BONUS_CASINO'));
        return response()->json($response);
    }
    public function roulette() {
        $response = [
            'body' => [],
            'confirm' => 'error',
            'category' => 'roulette'
        ];
        /*
        $post = new Pages();
        $data = $post->getPublicPostByUrl('casino');
        if(!$data->isEmpty()) {
            $response['body'] = self::dataMetaDecode($data[0]);
            $response['confirm'] = 'ok';
        }*/
        return response()->json($response);
    }
    public function games() {
        $response = [
            'body' => [],
            'confirm' => 'error',
            'category' => 'games'
        ];
        /*
        $post = new Pages();
        $data = $post->getPublicPostByUrl('casino');
        if(!$data->isEmpty()) {
            $response['body'] = self::dataMetaDecode($data[0]);
            $response['confirm'] = 'ok';
        }*/
        return response()->json($response);
    }
    public function blackjack() {
        $response = [
            'body' => [],
            'confirm' => 'error',
            'category' => 'blackjack'
        ];
        /*
        $post = new Pages();
        $data = $post->getPublicPostByUrl('casino');
        if(!$data->isEmpty()) {
            $response['body'] = self::dataMetaDecode($data[0]);
            $response['confirm'] = 'ok';
        }*/
        return response()->json($response);
    }
    public function baccarat() {
        $response = [
            'body' => [],
            'confirm' => 'error',
            'category' => 'baccarat'
        ];
        /*
        $post = new Pages();
        $data = $post->getPublicPostByUrl('casino');
        if(!$data->isEmpty()) {
            $response['body'] = self::dataMetaDecode($data[0]);
            $response['confirm'] = 'ok';
        }*/
        return response()->json($response);
    }
    public function newSlots() {
       $response = self::dataForSlotCategory(config('constants.CATEGORY.NEW_SLOTS'));
       return response()->json($response);
    }
    public function bestForPayout() {
        $response = self::dataForSlotCategory(config('constants.CATEGORY.BEST_FOR_PAYOUT'));
        return response()->json($response);
    }
    public function bonusPay() {
        $response = self::dataForSlotCategory(config('constants.CATEGORY.BONUS_PAY'));
        return response()->json($response);
    }
    public function progressive() {
        $response = self::dataForSlotCategory(config('constants.CATEGORY.PROGRESSIVE'));
        return response()->json($response);
    }
    public function megaways() {
        $response = self::dataForSlotCategory(config('constants.CATEGORY.MEGAWAYS'));
        return response()->json($response);
    }
    protected static function dataMetaDecode($data){
        $newData = [];
        $newData['title'] = htmlspecialchars_decode($data->title);
        $newData['short_desc'] = htmlspecialchars_decode($data->short_desc);
        $newData['h1'] = htmlspecialchars_decode($data->h1);
        $newData['meta_title'] = htmlspecialchars_decode($data->meta_title);
        $newData['description'] = htmlspecialchars_decode($data->description);
        $newData['keywords'] = htmlspecialchars_decode($data->keywords);
        $str = htmlspecialchars_decode(html_entity_decode($data->content));
        $str = str_replace('<pre', '<div', $str);
        $str = str_replace('</pre', '</div', $str);
        $str = str_replace('&nbsp;', '', $str);
        $str = str_replace( '<p><br></p>', '', $str);
        $str = str_replace( '<p></p>', '', $str);
        $newData['content'] = $str;
        return $newData;
    }
    protected static function dataForCasinoCategory($url) {
        $response = [
            'body' => [],
            'confirm' => 'error'
        ];
        $category = new Category();
        $data = $category->getPublicPostByUrl($url);
        if(!$data->isEmpty()) {
            $response['body'] = self::dataMetaDecode($data[0]);
            $relative_casino = $category->getPublicPostsFromCategory($data[0]->id);
            $arr_id = [];
            foreach ($relative_casino as $item ) $arr_id[] = $item->id;
            $casino = new Posts(['post_type' => 'casino']);
            $response['body']['casino'] = CardBuilder::casinoCard($casino->getPublicPostsByArrIdWithRating($arr_id));
            $response['body']['category_link'] = [];
            $parent_category = $category->getPublicPostByUrl(config('constants.CATEGORY.CASINO'));
            if(!$parent_category->isEmpty()) {
                $response['body']['category_link'] = CardBuilder::categoryLinks($category->getChildPublicCategory($parent_category[0]->id));
            }
            $response['confirm'] = 'ok';
            Cash::store(url()->current(), json_encode($response));
        }
        return $response;
    }
    protected static function dataForSlotCategory($url) {
        $response = [
            'body' => [],
            'confirm' => 'error',
        ];
        $category = new Category();
        $data = $category->getPublicPostByUrl($url);
        $response['body']['category_link'] = [];
        if(!$data->isEmpty()) {
            $response['body'] = self::dataMetaDecode($data[0]);
            $main_category = $category->getPublicPostByUrl(config('constants.CATEGORY.SLOTS'));
            $response['body']['category_link'] = CardBuilder::categoryLinks($category->getChildPublicCategory($main_category[0]->id));
            $relative_slots = $category->getPublicPostsFromCategory($data[0]->id);
            $arr_id = [];
            foreach ($relative_slots as $item ) $arr_id[] = $item->id;
            $slots = new Posts(['post_type' => 'slot']);
            $response['body']['slots'] = CardBuilder::mainSlotCard($slots->getPublicPostsByArrIdWithRating($arr_id));
            $response['confirm'] = 'ok';
            Cash::store(url()->current(), json_encode($response));
        }
        return $response;
    }
}



