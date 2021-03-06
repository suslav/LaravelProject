<?php

namespace App\Api\V1\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests;

use JWTAuth;
use App\Book;
use App\Videocategories;
use App\Articles;
use App\Dialyschdule;
use Dingo\Api\Routing\Helpers;

class BookController extends Controller
{
  use Helpers;

  public function index()
{

   //  $currentUser = JWTAuth::parseToken()->authenticate();
   // return $currentUser
    //    ->books()
    //    ->orderBy('created_at', 'DESC')
    //     ->get()
    //   ->toArray();


	//  return videocategory()       
  //        ->get()
  //      ->toArray();

    $books = Videocategories::all();	 
  	$response = [
   //	'msg' => 'List of all books',
  	'books' => $books
  	]; 

   	return response()->json($response,200); 

	 
	   
}

public function store(Request $request)
{
    $currentUser = JWTAuth::parseToken()->authenticate();   

    $book = new Book;

    $book->title = $request->get('title');
    $book->author_name = $request->get('author_name');
    $book->pages_count = $request->get('pages_count');

   	 if($currentUser->books()->save($book))
        return $this->response->created();
    else
        return $this->response->error('could_not_create_book', 500);
}
    
}
