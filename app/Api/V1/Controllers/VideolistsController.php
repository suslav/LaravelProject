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
   use Helpers;

   public function store(Request $request)
{


  //  $currentUser = JWTAuth::parseToken()->authenticate();   

  //  $video = new Videolists;

  // $video->VideoTitle = $request->get('VideoTitle');
  //  $video->VideoDescription = $request->get('VideoDescription');
  //  $video->VideoEmbedcode = $request->get('VideoEmbedcode');
//	$video->VideoCategoryId = $request->get('VideoCategoryId');

 //	 if($currentUser->videolists()->save($video))
  //    return $this->response->created();
 // else
 //  return $this->response->error('could_not_create_video', 500);


	 $VideoTitle = $request->input('VideoTitle');
	 $VideoDescription = $request->input('VideoDescription');
	 $VideoEmbedcode = $request->input('VideoEmbedcode');
	$VideoCategoryId = $request->input('VideoCategoryId');

 	$vidlist = new Videolists([
	 'VideoTitle' => $VideoTitle,
	 'VideoDescription' => $VideoDescription,
	 'VideoEmbedcode' => $VideoEmbedcode,
	 'VideoCategoryId' =>$VideoCategoryId
	 ]);


	 if($vidlist->save())
	 {	 
	 $response = [	
	 'user' => $vidlist
	 ];
	 return response()->json($vidlist,201);
	 }

 	$response = [
	 'msg' => 'An error occurred'
 	];

	 return response()->json($response,404);


}

 public function index()
{
  
   $videos = Videolists::all();	   

  // $videos = Videolists::where('VideoCategoryId',1)->get();  
   return response()->json($videos);    
}

public function show($id)
{
   $videos = Videolists::where('VideoCategoryId',$id)->get();  
   return response()->json($videos); 
}

public function showbyid($id)
{
   $videos = Videolists::where('VideoId',$id)->get(); 
   return response()->json($videos); 
}

}
