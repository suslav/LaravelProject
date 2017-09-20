<?php

namespace App\Api\V1\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests;
use JWTAuth;
use App\Events;
use Dingo\Api\Routing\Helpers;

class EventsController extends Controller
{
     use Helpers;

	   public function store(Request $request)
   { 

	 $EventTitle = $request->input('EventTitle');
	 $EventDescription = $request->input('EventDescription');	
	 $EventFromDate = $request->input('EventFromDate');
	 $EventToDate = $request->input('EventToDate');
	 $EventImageUrl = $request->input('EventImageUrl');

 	$vidlist = new Events([
	 'EventTitle' => $EventTitle,
	 'EventDescription' => $EventDescription,
	 'EventFromDate' => $EventFromDate,
	 'EventToDate' => $EventToDate,
	 'EventImageUrl' => $EventImageUrl
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
  
   $events = Events::all();	   
   return response()->json($events);    
}

public function showbyid($id)
{
   $events = Events::where('EventID',$id)->get(); 
   return response()->json($events); 
}


}
