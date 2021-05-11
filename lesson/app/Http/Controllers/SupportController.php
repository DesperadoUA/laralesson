<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\Users;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
        $data = [
            'name' => 'admin1',
            'password' => 'ecce4e1a7fc1fc293971c1a8eb58f99c'
        ];
        echo Users::login($data['name'], $data['password']);
        */
        /*
        $data = [
            'post_type' => 'casino',
            'status' => 'public',
            'permalink' => 'casino-',
            'slug' => 'casino',
            'title' => 'Title casino ',
            'thumbnail' => 'https://profimtk.ru/wp-content/uploads/2021/03/reelemperor.png',
            'short_desc' => 'Геймер, выбирающий азартные игры в качестве развлечения, желает получить',
            'h1' => 'Международное казино ReelEmperor (Рил Эмперор) выгоды качественного обслуживания',
            'meta_title' => 'ReelEmperor Title',
            'description' => 'ReelEmperor Description',
            'keywords' => 'ReelEmperor Keywords',
            'content' => 'Content',
            'lang' => 1
        ];
        $meta_data = [
           'bonuses' => 'Casino bonus',
           'currency' => 'Casino currency',
           'faq' => 'Faq',
           'faq_title' => 'Faq Title',
           'methods_pay' => 'Methods pay',
            'methods_payout' => 'Methods payout',
            'min_deposit' => 'Min deposit',
            'min_payout' => 'Min payout',
            'rating' => 90,
            'ref' => '/go/',
            'sub_title' => 'Sub title',
            'valuta' => '50 UAH / 10 USD / 250 RUB',
            'vendors' => 'Vendors',
            'video_banner' => 'video banner link',
            'video_iframe' => 'video_iframe'
        ];
        $db = new Posts(['post_type' => 'casino']);
        for($i=0; $i<20; $i++) {
            $new_data = $data;
            $new_data['permalink'] .= $i;
            $new_data['title'] .= $i;
            $db->insert($new_data, $meta_data);
        }
        */
    }

}
