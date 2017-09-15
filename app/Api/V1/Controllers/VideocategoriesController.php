<?php

namespace App\Api\V1\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests;
use JWTAuth;
use App\Videocategories;
use Dingo\Api\Routing\Helpers;
class VideocategoriesController extends Controller
{
    public function index()
{
 
   //$videocat = Videocategories::all();	 
   $videocat = Videocategories::all();	 
 	$response = [  	
  	'videocat' => $videocat
  	]; 
  	//return response()->json($response,200);   
	
	return response()->json($videocat);    
}

}
