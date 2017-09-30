<?php

namespace App\Api\V1\Controllers;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use JWTAuth;
use App\Rituals;
use Dingo\Api\Routing\Helpers;

use Illuminate\Support\Facades\DB;

class RitualsController extends Controller
{
     use Helpers;

	 public function index()
{
  
 //  $srividya = Rituals::all();	   
//   return response()->json($srividya);    

$rituals = DB::table('Rituals')
    ->select('Rituals.RitualID','Rituals.RitualName','Rituals.When','Rituals.RitualCategoryID','RitualCategories.RitualCategory')
    ->leftJoin('RitualCategories', 'Rituals.RitualCategoryID', '=', 'RitualCategories.RitualCategoryID')
  
    ->get();
$data = [];
foreach($rituals as $ritual) {
    $data[] = [
        'RitualID'   => $ritual ->RitualID,
        'RitualName' => $ritual ->RitualName,
        'When' => $ritual ->When,
        'RitualCategoryID' => $ritual ->RitualCategoryID,
        'RitualCategory' => $ritual ->RitualCategory        
    ];
}
return response() ->json($data);
}



 public function store(Request $request)
{
 

	 $RitualName = $request->input('RitualName');
	 $When = $request->input('When');	
	 $RitualCategoryID = $request->input('RitualCategoryID');

 	$vidlist = new Rituals([
	 'RitualName' => $RitualName,
	 'When' => $When,
	 'RitualCategoryID' =>$RitualCategoryID
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
