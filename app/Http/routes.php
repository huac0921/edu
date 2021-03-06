<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


use App\Http\Models\User;


Route::group(['middleware' => ['web']], function () {

    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/login','LoginController@login');

});
Route::post('/test','PostController@index');

Route::post('/reg','Auth\AuthenticateController@register');

Route::post('oauth/access_token', function() {
    return Response::json(Authorizer::issueAccessToken());
});

////Create a test user, you don't need this if you already have.
//Route::get('/register',function(){
//    $user = new User();
//    $user->name='tester';
//    $user->email='test@test.com';
//    $user->password = Hash::make('password');
//    $user->save();
//});
$api = app('Dingo\Api\Routing\Router');

//Show user info via restful service.
$api->version('v1', ['namespace' => 'App\Http\Controllers'], function ($api) {
    $api->get('users', 'UsersController@index');
    $api->get('users/{id}', 'UsersController@show');
});

//Just a test with auth check.
$api->version('v1', ['middleware' => 'api.auth'] , function ($api) {
    $api->get('time', function () {
        return ['now' => microtime(), 'date' => date('Y-M-D',time())];
    });
});

