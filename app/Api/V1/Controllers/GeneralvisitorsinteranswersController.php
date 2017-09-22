<?php

namespace App\Api\V1\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use JWTAuth;
use App\Generalvisitorsinteranswers;
use App\Visitors;
use Dingo\Api\Routing\Helpers;

class GeneralvisitorsinteranswersController extends Controller
{
    use Helpers;

public function showbyid($id)
{
    $gvanw = Generalvisitorsinteranswers::where('VisitorFormID',$id)->get(); 
    return response()->json($gvanw);  
}

    public function store(Request $request)
   { 

        $now = new \DateTime();
        $datetime_field = $now->format('Y-m-d');


	  $UserID = $request->input('UserID');
	 
 	   $vidlist = new Visitors([
	  'UserID' => $UserID,
	  'FormTypeID' => 2,
	  'Date' => $datetime_field	 
	  ]);
	   
	 if($vidlist->save())
	 {	
	 
	    $GVIAnswer = $request->input('GVIAnswer');
	 
	    $gvanw = new Generalvisitorsinteranswers([
	   'GVIAnswer' => $GVIAnswer,
	   'GVIQuestionID' => 0,
	   'VisitorFormID' => $vidlist->id
	   ]);

	    if($gvanw->save())
	 {
	  return response()->json($gvanw,201);
	 }	   
	  }

 	$response = [
	 'msg' => 'An error occurred'
 	];

    return response()->json($response,404);
}
}
