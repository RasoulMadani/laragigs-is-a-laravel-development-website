<?php

use App\Jobs\SendReminderEmail;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/search',function(Request $request){
    return $request->allah;
});
Route::get('/listings',function(Request $request){
    $listings = Listing::all();
    
    return view('listings',["listings"=>$listings]);
});
Route::get('/listings/{id}',function($id){
    $listing = Listing::find($id);
    return view('listing',["listing"=>$listing]);
});

Route::get('/sendmail',function(){
    $job = (new SendReminderEmail())->delay(now()->addSeconds(10));
    dispatch($job);
    return 'email sended';
});