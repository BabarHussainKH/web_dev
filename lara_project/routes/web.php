<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminDashBoardController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\UserDashBoardController;
use App\Http\Middleware\AuthMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirstController;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\user\UserController1;
use App\Models\Customer;

Route::get('/Register', [DemoController::class, 'index']);
Route::post('/Register', [DemoController::class, 'Register']);
Route::get('/c ustomer', function () {
    $customer = customer::all();
    echo "<pre>";
    print_r($customer->toArray());
});
Route::get('/hello', function () {
    return view('Hello');
});



Route::resource('exams', ExamController::class);

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('admin')->group(function () {

    Route::get("/exam", [ExamController::class, 'index'])->name("exam.index")->middleware('MyAuth'); // middleware(AuthMiddleware::class);
    Route::get('/exam/create', [ExamController::class, 'create'])->name("exam.create");
    Route::post('/exam', [ExamController::class, 'store'])->name("exam.store");
    Route::get("/exam/{id}", [ExamController::class, 'show'])->name("exam.edit");
    Route::put("/exam/{id}", [ExamController::class, 'update'])->name("exam.update");
    Route::delete("/exam/{id}", [ExamController::class, 'destroye'])->name("exam.delete");
});



Route::get('/', function () {
    return view('welcome');
});


// User Authentication Routes

Route::middleware('guest')->group(function () {
    Route::get('/login', [UserController::class, 'index'])->name('login');
    Route::post('/check', [UserController::class, 'check'])->name('check');
    Route::get('/register', [UserController::class, 'create'])->name('register');
    Route::post('/register', [UserController::class, 'store'])->name('user.register');
});
//middleware implementation
Route::prefix('user')->middleware(['auth', 'user'])->group(function () {
    Route::post('/logout', [UserController::class, 'logout'])->name('user.logout')->middleware('clear_cookies');
    Route::get('/dashboard', [UserDashBoardController::class, 'dashboard']);
    Route::get('/exam', [UserDashBoardController::class, 'exam']);
    Route::get('/join_exam/{id}', [UserDashBoardController::class, 'join_exam']);
    Route::post('/submit_questions', [UserDashBoardController::class, 'submit_questions']);
    Route::get('/show_result/{id}', [UserDashBoardController::class, 'show_result']);
    Route::get('/apply_exam/{id}', [UserDashBoardController::class, 'apply_exam']);
    Route::get('/view_result/{id}', [UserDashBoardController::class, 'view_result']);
    Route::get('/view_answer/{id}', [UserDashBoardController::class, 'view_answer']);
});

// Admin Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/admin/login', [AdminController::class, 'index'])->name('admin.login')->middleware('clear_cookies');;
    Route::post('/admin/check', [AdminController::class, 'validateLogin'])->name('admin.check');
    Route::get('/admin/register', [AdminController::class, 'create'])->name('admin.register');
    Route::post('/admin/register', [AdminController::class, 'store'])->name('admin.store');
});

//middleware implementation
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::get('/dashboard', [AdminDashBoardController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('dashboard/exam_category', [AdminDashBoardController::class, 'exam_category'])->name('admin.exam_category');

    Route::get('dashboard/delete_category/{id}', [AdminDashBoardController::class, 'delete_category']);
    Route::get('dashboard/edit_category/{id}', [AdminDashBoardController::class, 'edit_category']);
    Route::get('dashboard/category_status/{id}', [AdminDashBoardController::class, 'category_status']);
    Route::get('dashboard/manage_exam', [AdminDashBoardController::class, 'manage_exam']);
    Route::get('dashboard/exam_status/{id}', [AdminDashBoardController::class, 'exam_status']);
    Route::get('dashboard/delete_exam/{id}', [AdminDashBoardController::class, 'delete_exam']);
    Route::get('dashboard/edit_exam/{id}', [AdminDashBoardController::class, 'edit_exam']);
    Route::get('dashboard/manage_students', [AdminDashBoardController::class, 'manage_students']);
    Route::get('dashboard/student_status/{id}', [AdminDashBoardController::class, 'student_status']);
    Route::get('dashboard/delete_students/{id}', [AdminDashBoardController::class, 'delete_students']);
    Route::get('dashboard/add_questions/{id}', [AdminDashBoardController::class, 'add_questions']);
    Route::get('dashboard/question_status/{id}', [AdminDashBoardController::class, 'question_status']);
    Route::get('dashboard/delete_question/{id}', [AdminDashBoardController::class, 'delete_question']);
    Route::get('dashboard/update_question/{id}', [AdminDashBoardController::class, 'update_question']);
    Route::get('dashboard/registered_students', [AdminDashBoardController::class, 'registered_students']);
    Route::get('dashboard/delete_registered_students/{id}', [AdminDashBoardController::class, 'delete_registered_students']);
    Route::get('dashboard/apply_exam/{id}', [AdminDashBoardController::class, 'apply_exam']);
    Route::get('dashboard/admin_view_result/{id}', [AdminDashBoardController::class, 'admin_view_result']);

    Route::post('dashboard/edit_question_inner', [AdminDashBoardController::class, 'edit_question_inner']);
    Route::post('dashboard/add_new_question', [AdminDashBoardController::class, 'add_new_question']);
    Route::post('dashboard/edit_students_final', [AdminDashBoardController::class, 'edit_students_final']);
    Route::post('dashboard/add_new_exam', [AdminDashBoardController::class, 'add_new_exam'])->name("exam.add_new_exam");
    Route::post('dashboard/add_new_category', [AdminDashBoardController::class, 'add_new_category']);
    Route::post('dashboard/edit_new_category', [AdminDashBoardController::class, 'edit_new_category']);
    Route::post('dashboard/edit_exam_sub', [AdminDashBoardController::class, 'edit_exam_sub']);
    Route::post('dashboard/add_new_students', [AdminDashBoardController::class, 'add_new_students']);
});




/* Student section routes */
Route::prefix('student')->middleware('guest')->group(function () {

    Route::get('/dashboard', [StudentController::class, 'dashboard']);

    Route::get('/exam', [StudentController::class, 'exam']);
    Route::get('/join_exam/{id}', [StudentController::class, 'join_exam']);
    Route::post('/submit_questions', [StudentController::class, 'submit_questions']);
    Route::get('/show_result/{id}', [StudentController::class, 'show_result']);
    Route::get('/apply_exam/{id}', [StudentController::class, 'apply_exam']);
    Route::get('/view_result/{id}', [StudentController::class, 'view_result']);
    Route::get('/view_answer/{id}', [StudentController::class, 'view_answer']);



    // Route::get('/logout', [AuthenticatedSessionController::class, 'destroy']);

});
