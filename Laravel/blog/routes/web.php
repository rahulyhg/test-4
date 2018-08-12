<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('basic1', function () {
    return 'Hello World!';
});

Route::post('basic2', function () {
    return 'post路由!';
});

Route::match(['get', 'post'], 'multy1', function () {
    return '多请求路由!';
});

Route::any('any_route', function(){
	return 'any类型的多请求路由，不限定请求形式!';
});

Route::get('User/{id}', function($id){
	return 'User-'. $id;
});

Route::get('User/{name?}', function($name = 'kity'){
	return '可以没有参数';
});

Route::get('User/{name?}', function($name = 'kity'){
	return $name;
})->where('name', '[A-Za-z]+');

Route::get('UserCenter/{id?}/{name?}', function($id = 0, $name = 'kity'){
	return $id . '-' . $name;
})->where(['id'=>'[\d]+', 'name'=>'[A-Za-z]+']);

Route::get('User/member-center', ['as' => 'center', function(){
	return route('center');
}]);

Route::group(['prefix'=>'member'], function(){
	Route::get('user/center', function(){
		return 'user/center';
	});
	Route::get('home', function(){
		return 'home';
	});
});

// Route::middleware(['first', 'second'])->group(function () {
// 	Route::get('/', function () {
// 		// 使用 first 和 second 中间件
// 	});
// 	Route::get('user/profile', function () {
// 		// 使用 first 和 second 中间件
// 	});
// });




