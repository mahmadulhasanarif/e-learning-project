<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\CourseController;
use App\Http\Controllers\admin\LessonController;
use App\Http\Controllers\frontend\CourseController as FrontendCourseController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\LessonController as FrontendLessonController;
use Illuminate\Support\Facades\Auth;
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
Route::get('/course', [FrontendCourseController::class, 'index']);
Route::get('/course/{course}', [FrontendCourseController::class, 'show'])->name('course.details');
Route::get('/lesson/{lesson}' , [FrontendLessonController::class, 'show'])->name('lesson.details');

Route::get('logout', [AuthController::class, 'logout']);


Route::middleware('auth')->group(function(){
    
    Route::get('/admin', [AdminController::class, 'index']);

    Route::resource('admin/category', CategoryController::class)->except(['show', 'edit', 'update']);

    Route::resource('admin/course', CourseController::class);
    
    Route::resource('admin/lesson', LessonController::class);
});





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
