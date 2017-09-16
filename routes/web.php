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
use App\Events\messageposted;

Route::get('/', function () {
    return view('welcome');
});

Route::get('chat',function(){
    return view('chat');
    // $redis = Redis::connection();
    // print_r($redis->get('name'));
    // $message = 'mey error daw';
    // $user = 'mark daniel';
    // event(new messageposted($message,$user));

})->middleware('auth');

Auth::routes();

//getmessage
Route::get('/messages',function(){
  return App\Message::with('user')->get();
})->middleware('auth');

//postmessage
Route::post('/messages',function(){

  $user = Auth::user();

  $message = $user->message()->create([
    'user_id'=> auth()->id(),
    'message'=> request()->get('message'),
  ]);
  
  //announce event
  //event (new  messageposted($message,$user));
  broadcast(new messageposted($message,$user))->toOthers();

})->middleware('auth');


Route::get('/home', 'HomeController@index')->name('home');
