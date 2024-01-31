<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* Route::get('url', function(){
    return view('viewFile')
})

*/

Route::get('/', function(){
    return view('index');
});
Route::get('/home/{name}/{id?}', function(string $name,int $id = null){
    return view('welcome')->with(compact('name','id'));
});
Route::get('/about', function(){
    return view ('about');
});
Route::get('/register', function(){
    return view ('register');
});
Route::post('/register',[UsersController::class, 'create']);

