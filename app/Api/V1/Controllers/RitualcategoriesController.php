<?php

namespace App\Api\V1\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests;
use JWTAuth;
use App\Ritualcategories;
use Dingo\Api\Routing\Helpers;

class RitualcategoriesController extends Controller
{
      public function index()
{
 
     
   $ritualcat = Ritualcategories::all();	 
 	$response = [  	
  	'videocat' => $ritualcat
  	]; 
  	 
	return response()->json($ritualcat);    
}
}
