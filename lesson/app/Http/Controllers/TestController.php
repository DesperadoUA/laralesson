<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Str;

class TestController extends BaseController
{
    public function __construct(){
        //$this->middleware('auth');
    }
    public function index(Request $request){

        /*
       $id = 8;
       $permalink = 'casino-';

       $candidate = Posts::getByPermalink($permalink);
       if($candidate->isEmpty()) return $permalink;
       else {
            if($candidate[0]->id == $id) return $permalink;
            else {
                $counter = 0;
                do {
                    $counter++;
                    $new_permalink = $permalink.'-'.$counter;
                    $new_candidate = Posts::getByPermalink($new_permalink);
                    if($new_candidate->isEmpty()) break;
                } while (true);
                return $new_permalink;
            }
        }
        */
    }
}
