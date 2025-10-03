<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\CollegeController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\lessonController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ResponsibilitiesController;
use App\Http\Controllers\UserController;

Route::view('/', 'home')->name('home');
Route::view('/home', 'home')->name('home');

Route::group([
    'prefix'=>'uni',
    'controller'=>UniversityController::class,
    'as'=>"uni."
], function(){
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/all', 'index')->name('universities');
    Route::get('/edit/{university}', 'edit')->name('edit');
    Route::post('/update', 'update')->name('update');
    Route::get('/delete/{university}', 'delete')->name('delete');
    Route::get('/show/{university}', 'show')->name('single');
    Route::get('/colleges/{university}', 'show_colleges')->name('colleges');
});

Route::group([
    'prefix'=>'college',
    'controller'=>CollegeController::class,
    'as'=>'college.'
], function(){
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('all', 'index')->name('colleges');
    Route::get('/edit/{college}', 'edit')->name('edit');
    Route::post('/update', 'update')->name('update');
    Route::get('/delete/{college}', 'delete')->name('delete');
    Route::get('/show/{college}', 'show')->name('single');
    Route::get('/majores/{college}', 'show_majores')->name('majores');
});

Route::group([
    'prefix'=>'major',
    'controller'=>MajorController::class,
    'as'=>'maj.'
], function(){
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/all', 'index')->name('majores');
    Route::get('/edit/{major}', 'edit')->name('edit');
    Route::post('/update', 'update')->name("update");
    Route::get('/delete/{major}', 'delete')->name('delete');
    Route::get('/show/{major}', 'show')->name('single');
});

Route::group([
    'prefix'=>'lesson',
    'controller'=>lessonController::class,
    'as'=>'lesson.'
], function(){
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/all', 'index')->name('lessons');
    Route::get('/edit/{lesson}', 'edit')->name('edit');
    Route::post('/update', 'update')->name('update');
    Route::get('/delete/{lesson}', 'delete')->name('delete');
    Route::get('/show/{lesson}', 'show')->name('single');
});

Route::group([
    'prefix'=>'responsibility',
    'controller'=>ResponsibilitiesController::class,
    'as'=>'resp.'
], function(){
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/all', 'index')->name('responsibilities');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::post('/update', 'update')->name('update');
    Route::get('/delete/{id}', 'delete')->name('delete');
    Route::get('/show/{id}', 'show')->name('single');
});

Route::group([
    'prefix'=>'user',
    'controller'=>UserController::class,
    'as'=>'user.'
], function(){
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/all', 'index')->name('users');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::post('/update', 'update')->name('update');
    Route::get('/delete/{id}', 'delete')->name('delete');
    Route::get('/show/{id}', 'show')->name('single');
    Route::get('/user/details/{id}', 'details')->name('detail');
    Route::post('/user/save_detail/', 'save_detail')->name('save_detail');
});

Route::group([
    'prefix'=>'teacher',
    'controller'=>TeacherController::class,
    'as'=>'teacher.'
], function(){
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/all', 'index')->name('users');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::post('/update', 'update')->name('update');
    Route::get('/delete/{id}', 'delete')->name('delete');
    Route::get('/show/{id}', 'show')->name('single');
});