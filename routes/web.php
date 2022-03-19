<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\CourseController;
use App\Http\Controllers\admin\LessonController;
use App\Http\Controllers\frontend\Courses;
use App\Http\Controllers\frontend\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/course', [Courses::class, 'index']);

Route::get('login', [AuthController::class, 'login_form']);
Route::post('login', [AuthController::class, 'login']);
Route::get('logout', [AuthController::class, 'logout']);


Route::middleware('auth')->group(function(){
    
    Route::get('/admin', [AdminController::class, 'index']);

    Route::resource('admin/category', CategoryController::class)->except(['show', 'edit', 'update']);

    Route::resource('admin/course', CourseController::class);
    
    Route::resource('admin/lesson', LessonController::class);
});




