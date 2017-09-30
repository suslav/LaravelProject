<?php
	
$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {

	$api->post('auth/login', 'App\Api\V1\Controllers\AuthController@login');
	$api->post('auth/signup', 'App\Api\V1\Controllers\AuthController@signup');
	$api->post('auth/recovery', 'App\Api\V1\Controllers\AuthController@recovery');
	$api->post('auth/reset', 'App\Api\V1\Controllers\AuthController@reset');

	$api->post('auth/store', 'App\Api\V1\Controllers\AuthController@store');

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

	$api->get('photoalbums', 'App\Api\V1\Controllers\PhotoalbumController@index');
	$api->get('photodisplay/{id}', 'App\Api\V1\Controllers\PhotoalbumController@showbyid');

	$api->get('articleslist', 'App\Api\V1\Controllers\ArticlesController@index');
	$api->get('articleslist/{id}', 'App\Api\V1\Controllers\ArticlesController@showbyid');
	

	$api->get('eventslist', 'App\Api\V1\Controllers\EventsController@index');
	$api->get('eventslist/{id}', 'App\Api\V1\Controllers\EventsController@showbyid');

	$api->get('srividyacourseslist', 'App\Api\V1\Controllers\SrividyacoursesController@index');
	$api->get('srividyacourseslist/{id}', 'App\Api\V1\Controllers\SrividyacoursesController@showbyid');

	$api->get('generalvisitorsanswerslist/{id}', 'App\Api\V1\Controllers\GeneralvisitorsanswersController@showbyid');
	$api->get('generalvisitorsinteranswerslist/{id}', 'App\Api\V1\Controllers\GeneralvisitorsinteranswersController@showbyid');
	$api->get('svcanswerlist/{id}', 'App\Api\V1\Controllers\SvcanswerController@showbyid');
	$api->get('srimahameruanswerslist/{id}', 'App\Api\V1\Controllers\SrimahameruanswersController@showbyid');

	$api->get('ritualslist', 'App\Api\V1\Controllers\RitualsController@index');

	$api->get('ritualcategoriesList', 'App\Api\V1\Controllers\RitualcategoriesController@index');

	
	
	

// });

   $api->group(['middleware' => 'api.auth'], function ($api) {

   $api->post('videolist/store', 'App\Api\V1\Controllers\VideolistsController@store');
   $api->post('photoalbum/store', 'App\Api\V1\Controllers\PhotoalbumController@store');
   $api->post('articles/store', 'App\Api\V1\Controllers\ArticlesController@store');
   $api->post('events/store', 'App\Api\V1\Controllers\EventsController@store');
   $api->post('srividyacourses/store', 'App\Api\V1\Controllers\SrividyacoursesController@store');

   $api->get('visitorslist/{date}', 'App\Api\V1\Controllers\VisitorsController@showbydate');
   $api->get('visitorslistbyid/{id}', 'App\Api\V1\Controllers\VisitorsController@showbyid');
   $api->post('generalvisitorsanswers/store', 'App\Api\V1\Controllers\GeneralvisitorsanswersController@store');
   $api->post('generalvisitorsinteranswers/store', 'App\Api\V1\Controllers\GeneralvisitorsinteranswersController@store');
   $api->post('svcanswer/store', 'App\Api\V1\Controllers\SvcanswerController@store');
   $api->post('srimahameruanswers/store', 'App\Api\V1\Controllers\SrimahameruanswersController@store');

   $api->get('userlist/{id}', 'App\Api\V1\Controllers\AuthController@showbyid');
  // $api->post('updateuser/{id}', 'App\Api\V1\Controllers\AuthController@update');

   $api->put('updateuser/{id}', 'App\Api\V1\Controllers\AuthController@update');
   $api->put('updatepassword/{id}', 'App\Api\V1\Controllers\AuthController@updatepassword');


   $api->post('reply/store', 'App\Api\V1\Controllers\ReplysController@store');
   $api->get('replydetail/{id}', 'App\Api\V1\Controllers\ReplysController@showbyid');

   $api->post('bookritual/store', 'App\Api\V1\Controllers\BookritualsController@store');
   $api->get('requstritualslist/{id}', 'App\Api\V1\Controllers\BookritualsController@showbyid');
   $api->get('bookritualbyid/{id}', 'App\Api\V1\Controllers\BookritualsController@showbybookritualid');

   $api->post('rituals/store', 'App\Api\V1\Controllers\RitualsController@store');
   $api->get('ritualslistdate/{date}', 'App\Api\V1\Controllers\BookritualsController@showbydate');

 });

});
