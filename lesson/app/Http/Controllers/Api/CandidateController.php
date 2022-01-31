<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ForumUsers;
use Illuminate\Http\Request;


class CandidateController extends Controller
{
    public function show($id)
    {
        $response = [
            'body' => [],
            'confirm' => 'error'
        ];
        if(ForumUsers::checkCandidate($id)) {
            ForumUsers::addUser($id);
            $response['confirm'] = 'ok';
        }
        return response()->json($response);
    }
}
