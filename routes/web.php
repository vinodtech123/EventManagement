<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user\UserController;
use App\Http\Controllers\user\EventController;

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

// route for showing register from
Route::get('/',[UserController::class,'signupForm'])->name('user.signupform');

// route for submitting register form data
Route::post('register',[UserController::class,'registerData'])->name('user.register');

// route for showing login form
Route::get('login',[UserController::class,'loginForm'])->name('user.login');

// route for authentication
Route::post('auth',[UserController::class,'userAuthenticate'])->name('user.authenticate');

Route::group(['middleware'=>'user_auth'],function(){

// route for dashboard
Route::get('event',[EventController::class,'event'])->name('user.event');

// route for manage event & first creating the add event form
Route::get('event-form',[EventController::class,'addEventForm'])->name('user.addevent');

// route for add event data
Route::post('add-event',[EventController::class,'addEventData'])->name('user.addeventdata');

// event edit
Route::get('edit-event/{id}',[EventController::class,'editEvent'])->name('user.editevent');

// update event
Route::post('update-event/{id}',[EventController::class,'updateEvent'])->name('user.updateevent');


// event delete
Route::get('delete-event/{id}',[EventController::class,'eventDelete'])->name('user.eventdelete');

// user logout route
Route::get('logout', function () {
        
    // way to delete the session
    session()->forget('User_Login');
    session()->forget('User_ID');
    
    return redirect('login');


})->name('user.logout');




});


