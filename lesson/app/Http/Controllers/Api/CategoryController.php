<?php

namespace App\Http\Controllers\Api;

use App\Models\Cash;
use App\Models\Posts;
use App\Models\Pages;
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
            $pageModel = new Pages();
            $autorPage = $pageModel->getPublicPostByUrl(config('constants.PAGES.AUTHOR'));
            $response['body']['author_name'] = $autorPage[0]->h1;
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
        $newData['index_seo'] = $data->index_seo;
        $newData['follow'] = $data->follow;
        $newData['create_at'] = $data->create_at;
        $str = htmlspecialchars_decode(html_entity_decode($data->content));
        $str = str_replace('<pre', '<div', $str);
        $str = str_replace('</pre', '</div', $str);
        $str = str_replace('&nbsp;', '', $str);
        $str = str_replace( '<p><br></p>', '', $str);
        $str = str_replace( '<p></p>', '', $str);
        $newData['content'] = $str;
        $newData['amp_content'] = self::parseAmpContent(htmlspecialchars_decode($str));
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
            $pageModel = new Pages();
            $autorPage = $pageModel->getPublicPostByUrl(config('constants.PAGES.AUTHOR'));
            $response['body']['author_name'] = $autorPage[0]->h1; 
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
            $pageModel = new Pages();
            $autorPage = $pageModel->getPublicPostByUrl(config('constants.PAGES.AUTHOR'));
            $response['body']['author_name'] = $autorPage[0]->h1; 
            $response['confirm'] = 'ok';
            Cash::store(url()->current(), json_encode($response));
        }
        return $response;
    }
    protected static function parseAmpContent($content) {
        $content = str_replace('<picture></picture>', '', $content);
        $content = str_replace('spellcheck="false"', '', $content);
        preg_match_all('|<picture>(.+?)<\/picture>|is', $content, $contentPictureData);
        for($i=0; $i<count($contentPictureData); $i++) {
            $content = str_replace($contentPictureData[$i], '', $content);
        }
        $parseImages = preg_match_all('/<img.*?src="([^"]+)".*?(?:data-original="([^"]+)".*?)?>/i', $content, $contentImagesData);
        $ampImageArr = [];
        foreach ($contentImagesData[0] as $key => $contentImageData) {
            $imageSrc = !empty($contentImagesData[1][$key]) ? $contentImagesData[1][$key] : '';
            $imageSrc = !empty($contentImagesData[2][$key]) ? $contentImagesData[2][$key] : $imageSrc;
            $imageInfo = getimagesize( $imageSrc);
            $imageSize = !empty($imageInfo[3]) ? $imageInfo[3] : 'width="520" height="180"';
            $imageAlt =  preg_match('/<img.*?alt="([^"]+).*?>/i', $contentImageData, $parseAlt);
            $imageAlt = !empty($parseAlt[1]) ? 'alt="' . $parseAlt[1]  . '"' : '';
            $ampImage = '<amp-img layout="responsive" ';
            $ampImage .= $imageSize;
            $ampImage .= ' src="' . $imageSrc . '"';
            $ampImage .= $imageAlt;
            $ampImage .= '></amp-img>';
            $replaceString = htmlentities($contentImageData);
            $content = str_replace($contentImageData, $ampImage, $content);
        }
        $parsedLinks = preg_match_all('/<a.*?href="([^"]+)".*?>.*?<\/a>/i', $content, $contentLinksData);
        foreach ($contentLinksData[0] as $key => $linkData){
            if ( strpos($contentLinksData[1][$key] ,'#')  !== 0 && !strpos($contentLinksData[1][$key] ,'amp')){
                if(strpos($contentLinksData[1][$key] ,'http')  !== 0 && $contentLinksData[1][$key] !== '/go/') {
                    $content = str_replace('href="' . $contentLinksData[1][$key] . '"', 'href="/amp' . rtrim($contentLinksData[1][$key], '/') . '"', $content);
                }
            }
        }
        $content = str_replace('<iframe', '<amp-iframe', $content);
        $content = str_replace('</iframe', '</amp-iframe', $content);
        $content = str_replace("100%", '300px', $content);
        $content = preg_replace('/xml:lang=".*?"/i', '', $content);
        return $content;
    }
}



