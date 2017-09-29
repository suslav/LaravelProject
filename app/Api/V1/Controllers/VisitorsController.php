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
  //$visitors = DB::table('Visitors')
//    ->join('users', 'Visitors.UserID', '=', 'users.id')
//    ->join('visitorformtypes', 'Visitors.FormTypeID', '=', 'visitorformtypes.FormTypeID')
//    ->where('Date', $date)
//    ->orderBy('Visitors.VisitorFormID', 'desc')
//    ->get();
//$data = [];
//foreach($visitors as $visitor) {
//    $data[] = [
//        'VisitorFormID'   => $visitor ->VisitorFormID,
//        'UserID' => $visitor ->UserID,
//        'FormTypeID' => $visitor ->FormTypeID,
//        'Date' => $visitor ->Date,
//        'UserName' => $visitor ->email,
//        'FormType' => $visitor ->FormType
//    ];
//}
//return response() ->json($data);

 $visitors = DB::table('Visitors')
    ->select('Visitors.VisitorFormID','Visitors.UserID','Visitors.FormTypeID','Visitors.Date','users.email','visitorformtypes.FormType','replys.ApproveStatus')
    ->leftJoin('users', 'Visitors.UserID', '=', 'users.id')
    ->leftJoin('visitorformtypes', 'Visitors.FormTypeID', '=', 'visitorformtypes.FormTypeID')
	->leftJoin('replys', 'Visitors.VisitorFormID', '=', 'replys.VisitorFormID')
    ->where('Date', $date)
    ->orderBy('Visitors.VisitorFormID', 'desc')
    ->get();
$data = [];
foreach($visitors as $visitor) {
    $data[] = [
        'VisitorFormID'   => $visitor ->VisitorFormID,
        'UserID' => $visitor ->UserID,
        'FormTypeID' => $visitor ->FormTypeID,
        'Date' => $visitor ->Date,
        'UserName' => $visitor ->email,
        'FormType' => $visitor ->FormType
		,'ApproveStatus' =>$visitor ->ApproveStatus
    ];
}
return response() ->json($data);

}


	public function showbyid($id)
{
 
//$visitors = DB::table('Visitors')
//    ->join('users', 'Visitors.UserID', '=', 'users.id')
//    ->join('visitorformtypes', 'Visitors.FormTypeID', '=', 'visitorformtypes.FormTypeID')
//    ->where('Visitors.UserID', $id)
//    ->orderBy('Visitors.VisitorFormID', 'desc')
//    ->get();

//$data = [];

//foreach($visitors as $visitor) {
//    $data[] = [
//        'VisitorFormID'   => $visitor ->VisitorFormID,
//        'UserID' => $visitor ->UserID,
//        'FormTypeID' => $visitor ->FormTypeID,
//        'Date' => $visitor ->Date,
//        'UserName' => $visitor ->email,
//        'FormType' => $visitor ->FormType
//    ];
//}
//return response() ->json($data);

 $visitors = DB::table('Visitors')
	->select('Visitors.VisitorFormID','Visitors.UserID','Visitors.FormTypeID','Visitors.Date','users.email','visitorformtypes.FormType','replys.ApproveStatus')
    ->leftJoin('users', 'Visitors.UserID', '=', 'users.id')
    ->leftJoin('visitorformtypes', 'Visitors.FormTypeID', '=', 'visitorformtypes.FormTypeID')
   // ->leftJoin('replys', 'Visitors.VisitorFormID', '=', 'replys.VisitorFormID') ->where('replys.VisitorFormID', '>', '0');
    ->leftJoin('replys', 'Visitors.VisitorFormID', '=', 'replys.VisitorFormID')
    ->where('Visitors.UserID', $id)
    ->orderBy('Visitors.VisitorFormID', 'desc')
   // ->get();
  // ->select('Visitors.VisitorFormID','Visitors.UserID','Visitors.FormTypeID','Visitors.Date','users.UserName','visitorformtypes.FormType','replys.ApproveStatus')
   ->get();

$data = [];

foreach($visitors as $visitor) {
    $data[] = [
        'VisitorFormID'   => $visitor ->VisitorFormID,
        'UserID' => $visitor ->UserID,
        'FormTypeID' => $visitor ->FormTypeID,
        'Date' => $visitor ->Date
		,'UserName' => $visitor ->email,
        'FormType' => $visitor ->FormType
       ,'ApproveStatus' =>$visitor ->ApproveStatus
    ];
}

   

//$visitors = DB::table('Visitors')
 //               ->select('Visitors.*','users.email')
 //               ->leftjoin('users', 'Visitors.UserID', '=', 'users.id')
              //  ->leftjoin('roles', 'roles.id', '=', 'role_user.role_id')
   //             ->where('Visitors.UserID', '=', $id)->get();


return response() ->json($data);


}


}
