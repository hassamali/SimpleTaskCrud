<?php

Route::get('/', function(){
    return redirect()->route('user.index');
});
Route::get('user/manage', 'UserController@manage')->name('user.manage');


Route::resource('user', 'UserController');