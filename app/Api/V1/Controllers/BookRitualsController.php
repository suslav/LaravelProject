<?php

namespace App\Api\V1\Controllers;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use JWTAuth;
use App\Bookrituals;
use Dingo\Api\Routing\Helpers;

use Illuminate\Support\Facades\DB;

class BookritualsController extends Controller
{
     use Helpers;

	   public function store(Request $request)
    { 

	  
	 $Name = $request->input('Name');
	 $Gotram = $request->input('Gotram');	 
	 $Gender = $request->input('Gender');	
	 $Address = $request->input('Address');	
	 $Mobile = $request->input('Mobile');	
	 $Date = $request->input('Date');	
	 $RitualID = $request->input('RitualID');	
	 $UserID = $request->input('UserID');	

 	$vidlist = new Bookrituals([
	 'Name' => $Name,
	 'Gotram' => $Gotram,
	 'Gender' => $Gender,
	 'Address' => $Address,
	 'Mobile' => $Mobile,
	 'Date' => $Date,
	 'RitualID' => $RitualID,
	 'UserID' => $UserID
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

 public function showbyid($id)
{
 $visitors = DB::table('Rituals')
	->select('Rituals.RitualID','Rituals.RitualName','Rituals.When','Rituals.RitualCategoryID','RitualCategories.RitualCategory','Bookrituals.Date','Bookrituals.BookritualID')
    ->leftJoin('RitualCategories', 'Rituals.RitualCategoryID', '=', 'RitualCategories.RitualCategoryID')
	 ->leftJoin('Bookrituals', 'Rituals.RitualID', '=', 'Bookrituals.RitualID')  
    ->where('Bookrituals.UserID', $id)  
    ->get();

$data = [];

foreach($visitors as $visitor) {
    $data[] = [
        'BookritualID'   => $visitor ->BookritualID,
        'RitualCategory' => $visitor ->RitualCategory,
        'RitualName' => $visitor ->RitualName,
        'Date' => $visitor ->Date
		 
    ];
} 
return response() ->json($data);
}

 public function showbydate($date)
{
 $visitors = DB::table('Rituals')
	->select('Rituals.RitualID','Rituals.RitualName','Rituals.When','Rituals.RitualCategoryID','RitualCategories.RitualCategory','Bookrituals.Date','Bookrituals.BookritualID','users.email')
    ->leftJoin('RitualCategories', 'Rituals.RitualCategoryID', '=', 'RitualCategories.RitualCategoryID')
	 ->leftJoin('Bookrituals', 'Rituals.RitualID', '=', 'Bookrituals.RitualID') 
	 ->leftJoin('users', 'Bookrituals.UserID', '=', 'users.id') 
    ->where('Bookrituals.Date', $date)  
    ->get();

$data = [];

foreach($visitors as $visitor) {
    $data[] = [
        'BookritualID'   => $visitor ->BookritualID,
        'RitualCategory' => $visitor ->RitualCategory,
        'RitualName' => $visitor ->RitualName,
		'When' => $visitor ->When,
        'Date' => $visitor ->Date,
		'Username' => $visitor ->email
		 
    ];
} 
return response() ->json($data);
}


 public function showbybookritualid($id)
{
 $visitors = DB::table('Bookrituals')
	//->select('Rituals.RitualID','Rituals.RitualName','Rituals.When','Rituals.RitualCategoryID','RitualCategories.RitualCategory','Bookrituals.Date','Bookrituals.BookritualID')
   // ->leftJoin('RitualCategories', 'Rituals.RitualCategoryID', '=', 'RitualCategories.RitualCategoryID')
	// ->leftJoin('Bookrituals', 'Rituals.RitualID', '=', 'Bookrituals.RitualID')  
    ->where('Bookrituals.BookritualID', $id)  
    ->get();

$data = [];

foreach($visitors as $visitor) {
    $data[] = [
        'BookritualID'   => $visitor ->BookritualID,
        'Name' => $visitor ->Name,
        'Gotram' => $visitor ->Gotram,
        'Gender' => $visitor ->Gender,
		'Address' => $visitor ->Address,
		'Mobile' => $visitor ->Mobile,
		'Date' => $visitor ->Date,
		 
    ];
} 
return response() ->json($data);
}



}
