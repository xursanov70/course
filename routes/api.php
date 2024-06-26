<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [RegisterController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::get('profile', [RegisterController::class, 'profile']);
    Route::get('search/user', [RegisterController::class, 'searchUser']);

    Route::post('create/category', [CategoryController::class, 'createCategory']);
    Route::get('get/category', [CategoryController::class, 'getCategory']);
    Route::get('show/category/{category_id}', [CategoryController::class, 'showByIdCategory']);

    Route::post('create/course', [CourseController::class, 'createCourse']);
    Route::get('get/course', [CourseController::class, 'getCourse']);
    Route::get('show/course/{course_id}', [CourseController::class, 'showByIdCourse']);

    Route::post('create/lesson', [LessonController::class, 'createLesson']);
    Route::get('get/lesson', [LessonController::class, 'getLesson']);
    Route::get('search/lesson', [LessonController::class, 'searchLesson']);
    Route::get('show/lesson/{lesson_id}', [LessonController::class, 'showByIdLesson']);
});
