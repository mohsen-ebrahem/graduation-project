<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\InstrumentController;
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



Auth::routes();
  

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/tuner', [App\Http\Controllers\tunerController::class, 'index'])->name('tuner');
Route::post('/course-added', [App\Http\Controllers\courseController::class, 'add_new'])->name('course-added');
Route::get('/store', [App\Http\Controllers\storeController::class, 'index'])->name('store');

Route::get('/book_instrument', [App\Http\Controllers\courseController::class, 'book_instrument'])->name('book_instrument');


//dashboard
Route::get('/dashboard', [App\Http\Controllers\dashboardController::class, 'index'])->name('dashboard');

Route::get('/dashboard/note', [App\Http\Controllers\dashboardController::class, 'note'])->name('dashboard_course');

Route::get('/dashboard/teacher', [App\Http\Controllers\dashboardController::class, 'teacher'])->name('dashboard_teacher');



Route::get('/book',[InstrumentController::class,'bookInstrument']);

Route::get('/courses', function(){
    return view('courses');
});

Route::get('/notes',function(){
    return view('note');
})->middleware('checkadminrole');

Route::get('/teachers',function(){
    return view('teacher');
});

Route::get('/single-teacher',function(){
    return view('singleteacher');
});



Route::get('/single-note',function(){
    return view('singlenote');
});
Route::get('/single_instrument',function(){
    return view('single_instrument');
});

Route::get('/add-course',function(){
    return view('add-course');
})->middleware('checkteacheroradminrole');

Route::get('/single-note',function(){
    return view('singlenote');
});

Route::get('/home',function(){
    return view('home');
});