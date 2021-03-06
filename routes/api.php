<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\MusicalNoteController;
use App\Http\Controllers\InstrumentController;
use App\Http\Controllers\LessonController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('/courses',CourseController::class);
Route::resource('/musicalNotes',MusicalNoteController::class);
Route::resource('/instruments',InstrumentController::class);
Route::resource('/lessons',LessonController::class);
//Route::post('/book-instrument',)