<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\getemailscontroller;
use App\Http\Controllers\readmailsubject;
use App\Http\Controllers\read_subject;
use App\Http\Controllers\subscribe_info;
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

Route::get('/', function () {
    return view("index");
});

Route::get('/subscribe', function () {
    return view("subscribe");
});

Route::post('/subscribe', [subscribe_info::class, 'subscribe_infor']);
Route::post('/unsubscribe', [subscribe_info::class, 'unsubscribe_infor']);



Route::get('/data', [getemailscontroller::class, 'getData']);

Route::get('/read_more/{param}',[readmailsubject::class, 'read_email_subject_function']);

