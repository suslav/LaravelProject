<?php

namespace App\Api\V1\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use JWTAuth;
use App\Svcanswer;
use App\Visitors;
use Dingo\Api\Routing\Helpers;

class SvcanswerController extends Controller
{
   use Helpers;

public function showbyid($id)
{
    $gvanw = Svcanswer::where('VisitorFormID',$id)->get(); 
    return response()->json($gvanw);   
}

    public function store(Request $request)
   { 

        $now = new \DateTime();
        $datetime_field = $now->format('Y-m-d');


	  $UserID = $request->input('UserID');
	 
 	   $vidlist = new Visitors([
	  'UserID' => $UserID,
	  'FormTypeID' => 3,
	  'Date' => $datetime_field	 
	  ]);
	   
	 if($vidlist->save())
	 {	
	 
	    $SVCAnswer = $request->input('SVCAnswer');	
	    $gvanw = new Svcanswer([
	   'SVCAnswer' => $SVCAnswer,
	   'SVCQuestionID' => 0,
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
