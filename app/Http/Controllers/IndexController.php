<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alaouy\Youtube\Facades\Youtube;

class IndexController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  array  $request (videoId)
     * @return Response
     */
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

    /**
     * Get video details and mount the array return.
     *
     * @param  String  $id (videoId)
     * @return Array
     */
    private function getVideoDetails($id)
    {
        if($id && is_string($id)){
            $rs = Youtube::getVideoInfo($id);
            return ['id' => $id, 'title' => $rs->snippet->title, 'description' => $rs->snippet->description, 'player' => $rs->player->embedHtml ];
        }

        return null;
    }
}
