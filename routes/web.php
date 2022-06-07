<?php

use App\Http\Controllers\ChatController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::controller(ChatController::class)->group(function(){
    Route::get('/Chat','index')->name('Chat');
    Route::post('/Chat','store')->name('Chat.store');
    Route::post('/Chat/AllMessage','allMessage')->name('Chat.allmessage');
});