<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerpusController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;
use App\Models\Book;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('only_guest')->group(function(){
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [UserController::class, 'inputData'])->name('input.user');
    Route::post('/login', [AuthController::class, 'authenticating'])->name('login');

});

Route::middleware('auth')->group(function(){

    Route::get('/books/{book}/borrow', [BorrowController::class, 'show'])->name('borrow.create');
    Route::post('/books/{book}/borrow', [BorrowController::class, 'store'])->name('borrow.store');
    Route::post('/pengembalian/{book}', [BorrowController::class, 'pengembalian'])->name('pengembalian');

    Route::get('/detail_book/{slug}', [BookController::class, 'showDetail'])->name('detail_book.show');
    Route::get('/admin', [PerpusController::class, 'admin'])->name('admin')->middleware('only_admin');
    Route::get('/borrows', [PerpusController::class, 'show_borrow'])->name('borrows')->middleware('only_admin');

    Route::get('/input', [BookController::class, 'input'])->middleware('only_admin');
    Route::post('/input', [BookController::class, 'inputData'])->name('input.data')->middleware('only_admin');
    Route::delete('/delete/{id}', [BookController::class,'delete'])->name('book.delete')->middleware('only_admin');
    Route::get('/edit/{id}', [BookController::class, 'edit'])->name('book.edit')->middleware('only_admin');
    Route::put('/update/{id}', [BookController::class, 'update'])->name('book.update')->middleware('only_admin');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index')->middleware('only_admin');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create')->middleware('only_admin');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store')->middleware('only_admin');
Route::get('/categories/{slug}/edit', [CategoryController::class, 'edit'])->name('categories.edit')->middleware('only_admin');
Route::put('/categories/{slug}', [CategoryController::class, 'update'])->name('categories.update')->middleware('only_admin');
Route::delete('/categories/delete/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy')->middleware('only_admin');

Route::get('/profile', [PerpusController::class, 'profile'])->name('profile');
Route::get('/daftar_pinjaman', [BookController::class, 'showBookStatus'])->name('pinjaman')->middleware('only_client');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Route::get('daftar-pinjaman', [BorrowController::class, 'index']);
});


Route::get('/main', [PerpusController::class, 'main'])->name('main');
Route::get('/book_list', [BookController::class, 'showBookList'])->name('book_list');











// Route::group(['prefix' => 'admin'], function () {
    
    Route::get('/user', [UserController::class, 'index'])->name('user.list');

    
    Route::get('/user/input', [UserController::class, 'input'])->name('user.input');

    
    Route::post('/user/input', [UserController::class, 'inputData'])->name('user.input.data');


    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');

    
    Route::put('/user/edit/{id}', [UserController::class, 'update'])->name('user.update');

    
    Route::delete('/user/delete/{id}', [UserController::class, 'delete'])->name('user.delete');

// });
