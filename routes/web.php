<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OfficeHours;
use App\Mail\TestMail;
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
    return view('welcome');
});
Route::get('/send', function () {
    Mail::to('negma1266@gmail.com')->send(new TestMail());
    return response('sendind');
});
