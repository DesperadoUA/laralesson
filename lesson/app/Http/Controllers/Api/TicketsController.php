<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ForumUsers;
use App\Models\Tickets;
use App\Models\Posts;
use Illuminate\Support\Str;
use App\CardBuilder;

class TicketsController extends Controller
{
    const CASINO_LIMIT = 10000;
    const CASINO_POST_TYPE = 'casino';
    const LANG = 1;
    public function store(Request $request){
        $res = [
            'confirm' => 'error',
            'body' => []
        ];
        $title = $request->input('casino');
        $content = $request->input('content');
        $casino = Posts::getPostByTitle(self::LANG, self::CASINO_POST_TYPE, $title);
        if(!empty($casino)) {
            $data = [
                'forum_user_id' => $request->input('id'),
                'casino_id' => $casino[0]->id,
                'content' => $content,
                'admin_comment' => ''
            ];
            Tickets::insert($data);
        }
        return response()->json($res);
    }
    public function listCasino(){
        $res = [
            'confirm' => 'error',
            'error' => []
        ];
        $posts = new Posts(['post_type' => self::CASINO_POST_TYPE]);
        $settings = [
            'limit' => self::CASINO_LIMIT
        ];
        $data = $posts->getPublicPosts($settings);
        if(!$data->isEmpty()) {
            $res['confirm'] = 'ok';
            $res['body'] = CardBuilder::searchCard($data);
        }
        return response()->json($res);
    }
    public function userTickets(Request $request) {
        $res = [
            'confirm' => 'error',
            'body' => []
        ];
        $forum_user_id = $request->input('id');
        $posts = Tickets::getTicketsByUserId($forum_user_id);
        if(!empty($posts)) {
            $res['confirm'] = 'ok';
            $res['body'] = CardBuilder::ticketCard($posts);
        }
        return response()->json($res);
    }
}
