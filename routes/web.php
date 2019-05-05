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
// 	$collection = collect(['alice@gmail.com', 'bob@yahoo.com', 'carlos@gmail.com']);

// $counted = $collection->countBy(function ($email) {
//     return substr(strrchr($email, "@"),1);
// });

// return $counted->all();
    return view('welcome');
    /*
		$a = User::all();
	    $b = $a->pluck('id');
	    return $b;
    */
});

//Add New Route
Route::get('/Add-New-Data','PostController@index')->name('newData');
Route::post('/Add-New-Data','PostController@store');
Route::get('/All-Result','ResultController@index')->name('result');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/search',function()
{
	if (isset($_GET['q'])) {
		# code...
	$a = preg_replace('/[^A-Za-z0-9\-]/', '', $_GET['q']); // Replaces all spaces with hyphens.
	//return $a;
   //return preg_replace('/[^A-Za-z0-9\-]/', '', $string);
	if ($a!='') 
	{
		# code...
		return $a;
	}
	else
	{
		abort(404);
	}
}
else
	{
		abort(404);
	}
});
