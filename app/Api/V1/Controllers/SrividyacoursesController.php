<?php

namespace App\Api\V1\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use JWTAuth;
use App\Srividyacourses;
use Dingo\Api\Routing\Helpers;

class SrividyacoursesController extends Controller
{
      use Helpers;

	   public function store(Request $request)
   { 

	 $CouresTitle = $request->input('CouresTitle');
	 $CourseFromDate = $request->input('CourseFromDate');	
	 $CourseToDate = $request->input('CourseToDate');
	 $CourseImageUrl = $request->input('CourseImageUrl');
	 $CourseDescription = $request->input('CourseDescription');

 	$vidlist = new Srividyacourses([
	 'CouresTitle' => $CouresTitle,
	 'CourseFromDate' => $CourseFromDate,
	 'CourseToDate' => $CourseToDate,
	 'CourseImageUrl' => $CourseImageUrl,
	 'CourseDescription' => $CourseDescription
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
  
   $srividya = Srividyacourses::all();	   
   return response()->json($srividya);    
}

public function showbyid($id)
{
   $srividya = Srividyacourses::where('CourseID',$id)->get(); 
   return response()->json($srividya); 
}

}
