<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alaouy\Youtube\Facades\Youtube;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $return = [];
        $result = Youtube::searchVideos($search);

        if(count($result)){
            foreach($result as $data ){
                $id = $data->id->videoId;
                $return[] = $this->getVideoDetails($id);
            }
        }

        return $return;
    }

    private function getVideoDetails($id)
    {

        if($id && is_string($id)){
            $rs = Youtube::getVideoInfo($id);
            //dd($rs->player->embedHtml);
            return ['id' => $id, 'title' => $rs->snippet->title, 'description' => $rs->snippet->description, 'player' => $rs->player->embedHtml ];
        }

        return null;
    }
}
