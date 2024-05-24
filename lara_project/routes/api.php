<?php

use App\Http\Controllers\BooksController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// To create api.php file in routes folder
// php artisan install:api

Route::get("/books", [BooksController::class, 'index'])->name("books.index"); // get All
Route::post("/books", [BooksController::class, 'store'])->name("books.store"); // add new
Route::get("/books/{id}", [BooksController::class, 'show'])->name("books.show"); // show one

Route::put("/books/{id}", [BooksController::class, 'update'])->name("books.update"); // update one
Route::delete('/books/{id}', [BooksController::class, 'destroy'])->name("books.delete"); //delete one 