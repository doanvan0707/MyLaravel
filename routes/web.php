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

Route::get('Khoahoc', function() {
		return 'Hello word!';
});
// Truyen tham so
Route::get('HoTen/{ten}', function($ten){
		echo "Ten cua ban la: " . $ten;
});

// Ví dụ về chỉ cho phép nhập giá trị biến $ngay là số
Route::get('Laravel/{ngay}', function($ngay){
		echo "Van Doan: " . $ngay;
})->where(['ngay' => '[0-9]+']);

// Ví dụ chỉ cho phép nhập giá trị biến $name là bảng chữ cái
Route::get('NhapTen/{name}', function($name){
		echo "Ten ban la: " . $name;
})->where(['name' => '[a-zA-Z]+']);

// Dinh danh
Route::get('Route1', function(){
		return 'Da doi ten';
})->name('MyRoute1');

//goi ten da duoc dinh danh
Route::get('MyRoute', function(){
		return redirect()->route('MyRoute1');
});

// Goi controller

Route::get('mycontroller', 'MyController@XinChao')->name('testname');

Route::get('ThamSo/{ten}', 'MyController@KhoaHoc');

//URL
Route::get('MyRequest', 'MyController@GetURL');

// Gui nhan du lieu voi request

Route::get('getForm', function(){
		return view('postForm');
});
Route::post('postForm', ['as' => 'postForm', 'uses' => 'MyController@postForm']);

// Cookie

Route::get('setCookie', 'MyController@setCookie');
Route::get('getCookie', 'MyController@getCookie');

Route::get('uploadFile', function(){
		return view('postFile');
});
Route::post('postFile', 'MyController@postFile')->name('postFile');
