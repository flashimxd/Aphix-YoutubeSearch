<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alaouy\Youtube\Facades\Youtube;

class IndexController extends Controller
{
    public function index(){

        $data = Youtube::searchVideos('Android');
        //$json = json_decode($data);
        //var_dump($json->items[0]->snippet->thumbnails);
        return response()->json($data[0]);

        //return Youtube::searchVideos('Android');
    }
}
