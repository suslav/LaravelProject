<?php

namespace App\Api\V1\Controllers;

use JWTAuth;
use Validator;
use Config;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Dingo\Api\Routing\Helpers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;
use Tymon\JWTAuth\Exceptions\JWTException;
use Dingo\Api\Exception\ValidationHttpException;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use Helpers;

    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        $validator = Validator::make($credentials, [
            'email' => 'required',
            'password' => 'required',
        ]);

		//$user = Auth::user();

		//$id = Auth::id();
		 
        if($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return $this->response->errorUnauthorized();
            }
        } catch (JWTException $e) {
            return $this->response->error('could_not_create_token', 500);
        }

        //return response()->json(compact('token'));	 

		return response()->json(['token' => $token,'UserTypeID'=>Auth::user()->UserTypeID,'UserID'=>Auth::user()->id]);	 
    }

    public function signup(Request $request)
    {
        $signupFields = Config::get('boilerplate.signup_fields');
        $hasToReleaseToken = Config::get('boilerplate.signup_token_release');

        $userData = $request->only($signupFields);

        $validator = Validator::make($userData, Config::get('boilerplate.signup_fields_rules'));

        if($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }

        User::unguard();
        $user = User::create($userData);
        User::reguard();

        if(!$user->id) {
            return $this->response->error('could_not_create_user', 500);
        }

        if($hasToReleaseToken) {
            return $this->login($request);
        }
        
        return $this->response->created();
    }

    public function recovery(Request $request)
    {
        $validator = Validator::make($request->only('email'), [
            'email' => 'required'
        ]);

        if($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }

        $response = Password::sendResetLink($request->only('email'), function (Message $message) {
            $message->subject(Config::get('boilerplate.recovery_email_subject'));
        });

        switch ($response) {
            case Password::RESET_LINK_SENT:
                return $this->response->noContent();
            case Password::INVALID_USER:
                return $this->response->errorNotFound();
        }
    }

    public function reset(Request $request)
    {
        $credentials = $request->only(
            'email', 'password', 'password_confirmation', 'token'
        );

        $validator = Validator::make($credentials, [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
        ]);

        if($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }
        
        $response = Password::reset($credentials, function ($user, $password) {
            $user->password = $password;
            $user->save();
        });

        switch ($response) {
            case Password::PASSWORD_RESET:
                if(Config::get('boilerplate.reset_token_release')) {
                    return $this->login($request);
                }
                return $this->response->noContent();

            default:
                return $this->response->error('could_not_reset_password', 500);
        }
    } 

	public function showbyid($id)
 {
   $user = User::where('id',$id)->get(); 
   return response()->json($user); 
}


public function updatepassword(Request $request, $id)
{

 $password = $request ->input('password');  

 $hashpassword = Hash::make($password);

     $user = DB::table('users')
            ->where('id', $id)
            ->update(['password' => $hashpassword]);

			if($user)
			{
			return response()->json($user,201);
			}
			else
			{
			
			$response = [
	 'msg' => 'An error occurred'
 	];

	 return response()->json($response,404);
			}
 }

public function update(Request $request, $id)
{

 $name = $request ->input('name');
 $City = $request ->input('City');
 $Country = $request ->input('Country');
 $Address = $request ->input('Address');
 $Mobile = $request ->input('Mobile');

     $user = DB::table('users')
            ->where('id', $id)
            ->update(['name' => $name,'City'=>$City,'Country'=>$Country,'Address'=>$Address,'Mobile'=>$Mobile]);

			if($user)
			{
			return response()->json($user,201);
			}
			else
			{
			
			$response = [
	 'msg' => 'An error occurred'
 	];

	 return response()->json($response,404);
			}
			

 
	 //    $currentUser = JWTAuth::parseToken()->authenticate();
//$user = $currentUser ->users() ->find($id);
//if (!$user)
//    throw new NotFoundHttpException;
//$user ->fill($request ->all());
//if ($user ->save())
//    return $this ->response ->noContent();
//else
//    return $this ->response ->error('could_not_update_book', 500);

//    $user = User::where('id',$id)->get();
//$name = $request ->input('name');
//$City = $request ->input('City');
//$Country = $request ->input('Country');
//$Address = $request ->input('Address');
//$Mobile = $request ->input('Mobile');

//$vidlist = $user([
//    'name' => $name,
//    'City' => $City,
//    'Country' => $Country,
//    'Address' => $Address,
//    'Mobile' => $Mobile,
//]);


//if ($vidlist ->save()) {
//    $response = [
//        'user' => $vidlist
//    ];
//    return response() ->json($vidlist, 201);
//}

//$response = [
//    'msg' => 'An error occurred'
//];

//return response() ->json($response, 404);

}


}