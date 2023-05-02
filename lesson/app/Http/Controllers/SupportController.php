<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Posts;
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
        $category = new Category();
        $data = $category->getPublicPostByUrl(config('constants.CATEGORY.SLOTS'));
        /*
        $response = [
            'title' => 'good day 2',
            'short_desc' => 'Hello world 2'
        ];
        $url = 'test-url-2';
        Cash::store($url, json_encode($response));
        Cash::deleteAll();*/
        $response = [
            'title' => 'good day 2',
            'short_desc' => htmlspecialchars_decode($data[0]->content)
        ];
        return response()->json($response);
        //return htmlspecialchars_decode($data[0]->content);
    }
    public function ref(){
        $data = [];
        $post = new Posts(['post_type' => 'casino']);
        $settings = [
            'limit' => 10000
        ];
        $arr_posts = $post->getPosts($settings);
        foreach ($arr_posts as $item) {
            $data[] = [
                'title' => $item->title,
                'ref' => json_decode($item->ref, true)
            ];
        }
        return view('ref', ['posts' => $data]);
    }
}
