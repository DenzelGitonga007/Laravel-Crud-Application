<?php

use Illuminate\Support\Facades\Route;
// Call the StudentContorller
use App\Http\Controllers\StudentContorller;

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

Route::get('/', function () {
    return view('welcome');
});

// Calling the index function from the StudentController
Route::get('student-list', [StudentContorller::class, "index"]);

// Getting the addStudent function from the StudentController
Route::get('add-student', [StudentContorller::class, "addStudent"]);

// The route for posting the data after the details are added from the "add-student form"
Route::post('save-student', [StudentContorller::class, "saveStudent"]);

// Editing the student
Route::get('edit-student/{id}', [StudentContorller::class, "editStudent"]);
// The post after the update
Route::post('update-student', [StudentContorller::class, "updateStudent"]);