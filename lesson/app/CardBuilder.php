<?php
namespace App;
use App\Models\Posts;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class CardBuilder {
    const BONUS_CASINO_DB = 'bonus_casino';
    const LENGTH_SHORT_DESC = 50;
    static function bonusCard($arr_bonuses){
        if(empty($arr_bonuses)) return [];
        $posts = [];
        foreach ($arr_bonuses as $item) {
            $current_casino_id = DB::table(self::BONUS_CASINO_DB)
                                  ->where('post_id', $item->post_id)
                                  ->get();
            if(!$current_casino_id->isEmpty()) {
               $casino_db = new Posts(['post_type' => 'casino']);
               $current_casino = $casino_db->getPublicPostById($current_casino_id[0]->relative_id);
               if(!$current_casino->isEmpty()) {
                   $posts[] = [
                       'permalink' => '/'.$item->slug.'/'.$item->permalink,
                       'title' => $current_casino[0]->title,
                       'icon'  => $current_casino[0]->icon,
                       'rating' => $item->rating,
                       'short_desc' => strip_tags(Str::substr(htmlspecialchars_decode($item->content, ENT_NOQUOTES), 0, self::LENGTH_SHORT_DESC).'...')
                   ];
               }
            }
        }
        return $posts;
    }
    static function casinoCard($arr_casino) {
        if(empty($arr_casino)) return [];
        $posts = [];
        foreach ($arr_casino as $item) {
            $posts[] = [
                'thumbnail' => $item->thumbnail,
                'rating' => $item->rating,
                'regular_offers' => $item->regular_offers,
                'live_chat' => $item->live_chat,
                'live_casino' => $item->live_casino,
                'vip_program' => $item->vip_program,
                'permalink' => '/'.$item->slug.'/'.$item->permalink,
                'ref' => $item->ref,
                'bonus' => $item->bonus,
                'bonus_wagering' => $item->bonus_wagering,
                'freespins' => $item->freespins,
                'freespins_wagering' => $item->freespins_wagering
            ];
         }
        return $posts;
    }
    static function slotCard($arr_slot) {
        if(empty($arr_slot)) return [];
        $posts = [];
        foreach ($arr_slot as $item) {
            $posts[] = [
                'thumbnail' => $item->thumbnail,
                'rating' => $item->rating,
                'rtp' => $item->rtp,
                'title' => $item->title,
                'permalink' => '/'.$item->slug.'/'.$item->permalink
            ];
        }
        return $posts;
    }
}

