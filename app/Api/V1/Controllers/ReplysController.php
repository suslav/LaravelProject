<?php

namespace App\Api\V1\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use JWTAuth;
use App\Replys;
use Dingo\Api\Routing\Helpers;

class ReplysController extends Controller
{
    use Helpers;


	  public function store(Request $request)
    { 

	    $now = new \DateTime();
        $datetime_field = $now->format('Y-m-d');

	 $UserID = $request->input('UserID');
	 $VisitorFormID = $request->input('VisitorFormID');	 
	 $ReplyMessage = $request->input('ReplyMessage');	
	 $ApproveStatus = $request->input('ApproveStatus');	

 	$vidlist = new Replys([
	 'UserID' => $UserID,
	 'VisitorFormID' => $VisitorFormID,
	 'ReplyMessage' => $ReplyMessage,
	 'ApproveStatus' => $ApproveStatus,
	 'ReplyDate' =>$datetime_field
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

}
