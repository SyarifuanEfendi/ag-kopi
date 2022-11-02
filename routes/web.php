<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\UsersController;

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

//be
Auth::routes();
Route::get('/login', 'LoginController@login')->name('login');
Route::post('proses_login', 'LoginController@proses_login')->name('proses_login');
Route::get('logout', 'LoginController@logout')->name('logout');
Route::get('home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('logoutaksi', 'LoginController@logoutaksi')->name('logoutaksi')->middleware('auth');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'PoktanMapController@index')->name('frontpage');
Route::get('/poktan/data', 'DataController@places')->name('poktan.data');
Route::post('/comment', 'FrontendController@comment');

Route::get('/add', function () {
    return view('be.page.artikel.add');
});

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['cek_login:admin']], function () {
        Route::resource('admin', 'UsersController');
        Route::resource('artikel', 'ArtikelController');
        Route::resource('poktan', 'PoktanController');
        Route::resource('gambar', 'GaleriController');
        Route::resource('Allfile', 'FileController');
        Route::resource('youtube', 'YoutubeController');
        Route::resource('komentar', 'KomenController');

        Route::get('/poktan/edit/{id}','PoktanController@edit');
        Route::post('/poktan/update','PoktanController@update');
    });
    Route::group(['middleware' => ['cek_login:editor']], function () {
        Route::resource('poktan_user', 'PoktanController');
    });
});



//fe
Route::get('/', function () {
    return view('fe/index');
});
Route::get('about', function () {
    return view('fe/about');
});
// Route::get('blog', function () {
//     return view('fe/blog');
// });
Route::get('blog','FrontendController@index');
Route::get('blog_detail/{id}', 'FrontendController@detail');
Route::get('contact','FrontendController@show');
Route::get('view_video', 'FrontendController@youtube');
Route::get('view_file', 'FrontendController@pdf');
Route::get('galeri', 'FrontendController@galeri');
Route::get('service', function () {
    return view('fe/service');
});

// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/', 'PoktanMapController@index')->name('frontpage');
// Route::get('/poktan/data', 'DataController@poktans')->name('poktan.data'); // DATA TABLE CONTROLLER

// Route::group(['middleware' => ['auth']], function () {
//     Route::resource('poktan', 'PoktanController');
// });
