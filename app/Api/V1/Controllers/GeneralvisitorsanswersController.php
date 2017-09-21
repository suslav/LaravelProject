<?php

namespace App\Api\V1\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use JWTAuth;
use App\Generalvisitorsanswers;
use App\Visitors;
use Dingo\Api\Routing\Helpers;

class GeneralvisitorsanswersController extends Controller
{
     use Helpers;

public function showbyid($id)
{
    $gvanw = Generalvisitorsanswers::where('VisitorFormID',$id)->get(); 
    return response()->json($gvanw); 

  // $gvanw = Generalvisitorsanswers::all(); 
  // return response()->json($gvanw); 
}

    public function store(Request $request)
   { 

        $now = new \DateTime();
        $datetime_field = $now->format('Y-m-d');


	  $UserID = $request->input('UserID');
	 
 	   $vidlist = new Visitors([
	  'UserID' => $UserID,
	  'FormTypeID' => 1,
	  'Date' => $datetime_field	 
	  ]);
	   
	 if($vidlist->save())
	 {	
	 
	    $GVAnswer = $request->input('GVAnswer');
	  //  $GVQuestionID = $request->input('GVQuestionID');	
	  //  $VisitorFormID = $request->input('VisitorFormID');	

	    $gvanw = new Generalvisitorsanswers([
	   'GVAnswer' => $GVAnswer,
	   'GVQuestionID' => 0,
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
