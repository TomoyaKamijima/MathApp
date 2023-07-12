<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProblemController;
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

Route::get('/', [ProblemController::class, 'index']);
Route::get('/problems/create', [ProblemController::class, 'create']);
Route::get('/problems/{problem}', [ProblemController::class, 'show']);
Route::post('/problems', [ProblemController::class, 'store']);

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
