<?php

namespace App\Api\V1\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests;
use JWTAuth;
use App\Articles;
use Dingo\Api\Routing\Helpers;

class ArticlesController extends Controller
{
   use Helpers;

   public function store(Request $request)
   { 

	 $ArticleTitle = $request->input('ArticleTitle');
	 $ArticleDescription = $request->input('ArticleDescription');	 

 	$vidlist = new Articles([
	 'ArticleTitle' => $ArticleTitle,
	 'ArticleDescription' => $ArticleDescription	 
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
  
   $articles = Articles::all();	   
   return response()->json($articles);    
}

}
