<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return "main page";
});
Route::get('/xxx', function(){
    return "Hello";
})->name("hello");
Route:: get('/hallo', function(){
    return redirect()->route('hello');
});
Route::get('/greet/{name}', function($name){
    return 'hello '. $name . "!";
});
Route::fallback(function(){
    return'still got somewhere';
});
