<?php

namespace App\Http\Controllers;

use App\Models\Cash;
use App\Models\Category;
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

}
