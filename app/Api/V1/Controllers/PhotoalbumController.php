<?php

namespace App\Api\V1\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests;
use JWTAuth;
use Dingo\Api\Routing\Helpers;
use App\Photoalbum;

class PhotoalbumController extends Controller
{
   use Helpers;

      public function store(Request $request)
  {
  
	 $Title = $request->input('Title');
	 $Description = $request->input('Description');
	 $AlbumUrl = $request->input('AlbumUrl');
     $AlbumThumbUrl = $request->input('AlbumThumbUrl');

 	$vidlist = new Photoalbum([
	 'Title' => $Title,
	 'Description' => $Description,
	 'AlbumUrl' => $AlbumUrl,
	 'AlbumThumbUrl' =>$AlbumThumbUrl
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
  
   $photos = Photoalbum::all();	   
   return response()->json($photos);    
}

public function showbyid($id)
{
   $photo = Photoalbum::where('AlbumId',$id)->get(); 
   return response()->json($photo); 
}


}
