<?php

namespace App\Api\V1\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use JWTAuth;
use App\Srimahameruanswers;
use App\Visitors;
use Dingo\Api\Routing\Helpers;

class SrimahameruanswersController extends Controller
{
    use Helpers;

public function showbyid($id)
{
    $gvanw = Srimahameruanswers::where('VisitorFormID',$id)->get(); 
    return response()->json($gvanw);  
}

    public function store(Request $request)
   { 

        $now = new \DateTime();
        $datetime_field = $now->format('Y-m-d');


	  $UserID = $request->input('UserID');
	 
 	   $vidlist = new Visitors([
	  'UserID' => $UserID,
	  'FormTypeID' => 4,
	  'Date' => $datetime_field	 
	  ]);
	   
	 if($vidlist->save())
	 {	
	 
	    $SMMAnswer = $request->input('SMMAnswer');	 
	    $gvanw = new Srimahameruanswers([
	   'SMMAnswer' => $SMMAnswer,
	   'SMMQuestionID' => 0,
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
