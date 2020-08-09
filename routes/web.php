<?php

use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;

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

// Root
// Route::get('/', function () {
//     return view('index');
// });

// Route::get('/about', function () {
//     $name = "Dicky Khusnaedy, A.Md.Kom";
//     return view('about', ['name' => $name]);
// });

Route::get('/', 'PageController@home');
Route::get('/about', 'PageController@about');
Route::get('/mahasiswa', 'MahasiswaController@index');

// Students
// Route::get('/students', 'StudentsController@index');
// Route::get('/students/create', 'StudentsController@create');
// Route::get('/students/{student}', 'StudentsController@show');
// Route::post('/students', 'StudentsController@store');
// Route::delete('/students/{student}', 'StudentsController@destroy');
// Route::get('/students/{student}/edit', 'StudentsController@edit');
// Route::put('/students/{student}', 'StudentsController@update');

Route::resource('students', 'StudentsController');
Route::resource('jurusan', 'JurusansController');
Route::resource('lecture', 'LecturersController');
