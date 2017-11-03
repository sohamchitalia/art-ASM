<?php

Route::get('/', function () {
    return view('home');
});
Route::get('/login', function () {
    return view('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/dashboard1',function(){
	return view('dashboard1');
});
Route::get('/register', function () {
    return view('register');
});
Route::get('/paintingupload', function () {
    return view('paintingupload');
});
Route::get('/paintings', function () {
    return view('paintinggrid');
});
Route::get('/blogs', function () {
    return view('blog');
});
Route::get('/blogform', function () {
    return view('blogform');
});

Route::post('/paintings', 'PaintingFormController@bidupdate');
//Route::get('/ref', function () {
//    return view('ref');
//});
//Route::get('refsms',array('uses'=>'HomeController@sms'));
Route::post('/formsubmit',array('uses'=>'PaintingFormController@uploadSubmit'));
Route::get('/test', 'PaintingFormController@view_paintings');
Route::get('/download/{file_param}', 'PaintingFormController@downloader');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/ref', 'RefController@generate');
Route::get('/refsms', 'RefController@sms');
Route::get('/refdisplay', 'RefController@displayref')->name('refdisplay');
//Route::get('myform',array('as'=>'myform','uses'=>'HomeController@myform'));
//Route::get('myform/ajax/{id}',array('as'=>'myform.ajax','uses'=>'HomeController@myformAjax'));

Route::get('/filtertest', function () {
    return view('filtertest');
});
Route::get('/startauction', 'PaintingFormController@startauction');

Route::get('/admin', function () {
    return view('admin');
});
Route::get('/blogs', 'BlogController@view_blogs');

Route::post('/blogsubmit',array('uses'=>'BlogController@blogsubmit'));
Route::post('/blogform',array('uses'=>'BlogController@admincheck'));
