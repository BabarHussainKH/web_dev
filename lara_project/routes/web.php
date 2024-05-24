<?php

use App\Http\Controllers\ExamController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirstController;
use App\Http\Controllers\DemoController;
use App\Models\Customer;
Route::get('/Register',[DemoController::class,'index']);
Route::post('/Register',[DemoController::class,'Register']);
Route::get('/c ustomer' ,function(){
$customer =customer::all();
echo "<pre>";
print_r($customer->toArray());
});
Route::get('/hello', function () {
    return view('Hello');
});



Route::resource('exams', ExamController::class);

// Route::get('/exam', function () {
//     return view('exam');
// });

Route::get("/exam", [ExamController::class, 'index'])->name("exam.index");
Route::get('/exam/create', [ExamController::class, 'create'])->name("exam.create");
Route::post('/exam', [ExamController::class, 'store'])->name("exam.store");
Route::get("/exam/{id}", [ExamController::class, 'show'])->name("exam.edit");
Route::put("/exam/{id}", [ExamController::class, 'update'])->name("exam.update");
Route::delete("/exam/{id}", [ExamController::class, 'destroye'])->name("exam.delete");