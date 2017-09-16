<?php
	
$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {

	$api->post('auth/login', 'App\Api\V1\Controllers\AuthController@login');
	$api->post('auth/signup', 'App\Api\V1\Controllers\AuthController@signup');
	$api->post('auth/recovery', 'App\Api\V1\Controllers\AuthController@recovery');
	$api->post('auth/reset', 'App\Api\V1\Controllers\AuthController@reset');

	// example of protected route
	$api->get('protected', ['middleware' => ['api.auth'], function () {		
		return \App\User::all();
    }]);

	// example of free route
	$api->get('free', function() {
		return \App\User::all();
	});

 //$api->group(['middleware' => 'api.auth'], function ($api) {

	$api->post('book/store', 'App\Api\V1\Controllers\BookController@store');
	$api->get('book', 'App\Api\V1\Controllers\BookController@index');

	$api->get('VideocategoriesList', 'App\Api\V1\Controllers\VideocategoriesController@index');
	
	$api->get('videoslist', 'App\Api\V1\Controllers\VideolistsController@index');
	$api->get('videoslist/{id}', 'App\Api\V1\Controllers\VideolistsController@show');
	$api->get('videodisplay/{id}', 'App\Api\V1\Controllers\VideolistsController@showbyid');

// });

 $api->group(['middleware' => 'api.auth'], function ($api) {

$api->post('videolist/store', 'App\Api\V1\Controllers\VideolistsController@store');

 });

});
