<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
Route::group(
    ['middleware' => 'prevent-back-history'],
    function () {
        Auth::routes();

        // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

        /*Admin*/
        Route::prefix('admin')->group(function () {
            Route::get('login', [App\Http\Controllers\Auth\Admin\LoginController::class, 'showLoginForm'])->name('admin.login');
            Route::post('login', [App\Http\Controllers\Auth\Admin\LoginController::class, 'login']);
            Route::post('logout', [App\Http\Controllers\Auth\Admin\LoginController::class, 'logout'])->name('admin.logout');
            Route::get('dashboard', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('Student.list');
            Route::get('/fetch', [App\Http\Controllers\Admin\AdminController::class, 'paginationstudent'])->name('pagination.student');
            Route::delete('/{id}', [App\Http\Controllers\Admin\AdminController::class, 'studentdelete']);
            Route::get('listresult', [App\Http\Controllers\Admin\AdminController::class, 'mainresult'])->name('list.result');
            Route::get('listresult/fetch', [App\Http\Controllers\Admin\AdminController::class, 'paginationresult'])->name('pagination.result');
            Route::get('teacherlist', [App\Http\Controllers\Admin\AdminController::class, 'teachermain'])->name('Teacherss.list');
            Route::get('teacherlist/fetch', [App\Http\Controllers\Admin\AdminController::class, 'teacherpagination'])->name('teacher.pagination');
            Route::delete('teacherlist/{id}', [App\Http\Controllers\Admin\AdminController::class, 'teacherdelete']);
            Route::post('addsubject', [App\Http\Controllers\Admin\AdminController::class, 'addnewsubject'])->name('add.newsubject');
            Route::get('subjectlist', [App\Http\Controllers\Admin\AdminController::class, 'subjectmain'])->name('Subject.list');
            Route::post('subjectlist/fetch', [App\Http\Controllers\Admin\AdminController::class, 'subjectpagination'])->name('subject.pagination');
            Route::get('subjectlist/{id}', [App\Http\Controllers\Admin\AdminController::class, 'subjectedit']);
            Route::put('subjectlist/updatesubject', [App\Http\Controllers\Admin\AdminController::class, 'subjectupdate'])->name('Subject.update');
            Route::delete('subjectlist/{id}', [App\Http\Controllers\Admin\AdminController::class, 'subjectdelete']);
            Route::post('addstandard', [App\Http\Controllers\Admin\AdminController::class, 'addnewstandard'])->name('add.newstandard');
            Route::get('standardlist', [App\Http\Controllers\Admin\AdminController::class, 'standardmain'])->name('Standard.list');
            Route::post('standardlist/fetch', [App\Http\Controllers\Admin\AdminController::class, 'standardpagination'])->name('standard.pagination');
            Route::delete('standardlist/{id}', [App\Http\Controllers\Admin\AdminController::class, 'standarddelete']);
        });


        /*Student*/
        Route::prefix('student')->group(function () {
            Route::get('login', [App\Http\Controllers\Auth\Student\LoginController::class, 'showLoginForm'])->name('student.login');
            Route::post('login', [App\Http\Controllers\Auth\Student\LoginController::class, 'login']);
            Route::post('logout', [App\Http\Controllers\Auth\Student\LoginController::class, 'logout'])->name('student.logout');
            Route::get('register', [App\Http\Controllers\Auth\Student\RegisterController::class, 'showRegistrationForm'])->name('student.register');
            Route::post('register', [App\Http\Controllers\Auth\Student\RegisterController::class, 'register']);
            Route::get('dashboard', [App\Http\Controllers\Student\StudentController::class, 'index'])->name('student.dashboard');
            Route::post('/result', [App\Http\Controllers\Student\StudentController::class, 'result'])->name('Student.result');
        });


        /*Teacher*/
        Route::prefix('teacher')->group(function () {
            Route::get('login', [App\Http\Controllers\Auth\Teacher\LoginController::class, 'showLoginForm'])->name('teacher.login');
            Route::post('login', [App\Http\Controllers\Auth\Teacher\LoginController::class, 'login']);
            Route::post('logout', [App\Http\Controllers\Auth\Teacher\LoginController::class, 'logout'])->name('teacher.logout');
            Route::get('register', [App\Http\Controllers\Auth\Teacher\RegisterController::class, 'showRegistrationForm'])->name('teacher.register');
            Route::post('register', [App\Http\Controllers\Auth\Teacher\RegisterController::class, 'register']);
            Route::get('dashboard', [App\Http\Controllers\Teacher\TeacherController::class, 'index'])->name('Teacher.list');
            Route::post('/fetch', [App\Http\Controllers\Teacher\TeacherController::class, 'studentpagination'])->name('teacher.pagination');
            Route::post('addresult', [App\Http\Controllers\Teacher\TeacherController::class, 'addstudentresult'])->name('add.result');
            Route::get('resultlist', [App\Http\Controllers\Teacher\TeacherController::class, 'resultmain'])->name('Result.list');
            Route::post('resultlist/fetch', [App\Http\Controllers\Teacher\TeacherController::class, 'resultpagination'])->name('Result.pagination');
        });
    }
);
