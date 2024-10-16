<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\ProfileController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



// Route::get('/', [StoreController::class,'index']);

Route::get('/products/create',[ProductController::class,'create'])->name('products.create');
Route::get('/products',[ProductController::class,'index'])->name('products.index');
Route::post('/products',[ProductController::class,'store'])->name('products.store');
Route::put('/products/{product}',[ProductController::class,'update'])->name('products.update'); 
Route::get('/products/{product}/edit',[ProductController::class,'edit'])->name('products.edit');
Route::delete('/products/{product}',[ProductController::class,'destroy'])->name('products.destroy');


Route::get('/categories/create',[CategoryController::class,'create'])->name('categories.create');
Route::get('/categories',[CategoryController::class,'index'])->name('category.index');
Route::post('/categories',[CategoryController::class,'store'])->name('categories.store');
Route::put('/categories/{category}',[CategoryController::class,'update'])->name('categories.update'); 
Route::get('/categories/{category}/edit',[CategoryController::class,'edit'])->name('categories.edit');
Route::delete('/categories/{category}',[CategoryController::class,'destroy'])->name('categories.destroy');
Route::delete('/categories/{category}/delete',[CategoryController::class,'delete'])->name('categories.delete');
Route::get('/categories/{category}/show',[CategoryController::class,'show'])->name('categories.show');

// use App\Http\Controllers\LoginController;

// Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
// Route::post('/login', [LoginController::class, 'login']);
// Route::post('/logout', [LoginController::class, 'logout'])->name('logout');