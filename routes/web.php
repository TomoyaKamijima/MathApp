<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProblemController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [ProblemController::class, 'index'])->name('index');
Route::get('/problems/create', [ProblemController::class, 'create'])->name('create')->middleware('auth');
Route::get('/problems/{problem}', [ProblemController::class, 'show'])->name('show');
Route::get('/answers/{problem}', [ProblemController::class, 'showAnswer'])->name('showAnswer');
Route::get('/problems/{problem}/edit', [ProblemController::class, 'edit'])->name('edit')->middleware('auth');
Route::put('/problems/{problem}', [ProblemController::class, 'update'])->name('update')->middleware('auth');
Route::delete('/problems/{problem}', [ProblemController::class, 'delete'])->name('delete')->middleware('auth');
Route::post('/problems', [ProblemController::class, 'store'])->name('store')->middleware('auth');
Route::get('/categories/{category}', [CategoryController::class,'index']);
Route::get('/levels/{level}', [LevelController::class,'index']);
Route::post('/answers/{problem}', [MessageController::class, 'store']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/problems', [ProblemController::class, 'index']);
//Route::get('/', [ProblemController::class, 'index'])->name('index');

require __DIR__.'/auth.php';
