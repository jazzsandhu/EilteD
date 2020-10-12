<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\UserAuth;

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
//call the login page on the default page
Route::get('/', function () {
    return view('login');
});

//reload the index file form dashboard using the controller
Route::get('dashboard', ExcelController::class, 'index');

Route::post('/import/excel', ExcelController::class, 'import');

//login route and also checked if the session is alive or not
Route::get('/',function(){
    if(session()->has('user')){
       return redirect('dashboard');
    }
    return view('login');
});
//get the values of the login form
Route::post("user",[UserAuth::class,'userLogin']);
//route for the dashboard
//protect dashboard
Route::get('/dashboard',function(){
    if(session()->has('user')){
        return view('dashboard');
    }
    return redirect('/');
});

//destroy the session on logout

Route::get('/logout', function () {
    //check if the session has the user key
    if(session()->has('user')){
        session()->pull('user');
    }
    return redirect('/');
});