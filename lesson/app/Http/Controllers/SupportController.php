<?php

namespace App\Http\Controllers;

use App\Models\Cash;
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
        $response = [
            'title' => 'good day 2',
            'short_desc' => 'Hello world 2'
        ];
        $url = 'test-url-2';
        Cash::store($url, json_encode($response));
        Cash::deleteAll();
    }

}
