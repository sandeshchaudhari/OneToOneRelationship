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

use App\Address;
use App\User;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/create',function(){
   $user=\App\User::find(1);
   $address=new Address(['name'=>'mordev nagar,vasind']);
   $user->address()->save($address);
});
Route::get('/update',function(){
   $address=Address::where('user_id',1)->first();
   $address->name="updated address";
   $address->save();
});

Route::get('/get',function(){
$address=Address::where('user_id',1)->first();
echo $address->name;
$user=User::findOrFail(1);
echo $user->address->name;


});

Route::get('/delete',function(){
   $user=User::findOrFail(1);
   $user->address()->delete();
});