<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Reviews;

class BlogController extends Controller
{
    const POST_TYPE = 'blog';
    public function index()
    {
        $posts = new Posts(['post_type' => self::POST_TYPE]);
        $data = $posts->getPublicPosts();
        return response()->json($data);
    }
    public function show($id)
    {
        $response = [
            'body' => [],
            'status' => '404'
        ];
        $post = new Posts(['post_type' => self::POST_TYPE]);
        $data = $post->getPublicPostByUrl($id);
        if(!empty(count($data))) {
            $response['body'] = $data[0];
            $response['reviews'] = Reviews::getPostsByPostId($data[0]->id);
            $response['status'] = '200';
        }
        return response()->json($response);

    }
}
