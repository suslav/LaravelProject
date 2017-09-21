<?php

namespace App\Api\V1\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use JWTAuth;
use App\Visitors;
use Dingo\Api\Routing\Helpers;

use Illuminate\Support\Facades\DB;

class VisitorsController extends Controller
{
    use Helpers;

	public function showbydate($date)
{
   //$visitors = Visitors::where('Date',$date)->get(); 

   $visitors = DB::table('Visitors')
               ->join('users', 'Visitors.UserID', '=', 'users.id')
			   ->join('visitorformtypes', 'Visitors.FormTypeID', '=', 'visitorformtypes.FormTypeID')
               ->where('Date', $date)
			   ->orderBy('Visitors.VisitorFormID', 'desc')
			   ->get(); 
    // return response()->json($visitors); 

     $data = [];

	   foreach ($visitors as $visitor) {
            $data[] = [
                'VisitorFormID'   => $visitor->VisitorFormID,    
	 			'UserID' => $visitor->UserID,
	 			'FormTypeID' => $visitor->FormTypeID,
	 			'Date' => $visitor->Date,
	 			'UserName' => $visitor->email,
	 			'FormType' => $visitor->FormType
             ];
         }

		//return json_encode($data);  
        return response()->json($data);
}

}
