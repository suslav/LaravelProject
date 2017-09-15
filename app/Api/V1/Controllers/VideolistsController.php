<?php

namespace App\Api\V1\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests;
use JWTAuth;
use App\Videolists;
use Dingo\Api\Routing\Helpers;
class VideolistsController extends Controller
{
   public function store(Request $request)
{
    $currentUser = JWTAuth::parseToken()->authenticate();   

    $video = new Videolists;

    $video->VideoTitle = $request->get('VideoTitle');
    $video->VideoDescription = $request->get('VideoDescription');
    $video->VideoEmbedcode = $request->get('VideoEmbedcode');
	$video->VideoCategoryId = $request->get('VideoCategoryId');

   	 if($currentUser->videolists()->save($video))
        return $this->response->created();
    else
        return $this->response->error('could_not_create_video', 500);
}

 public function index()
{
  
   $videos = Videolists::all();	   
	return response()->json($videos);    
}

}
