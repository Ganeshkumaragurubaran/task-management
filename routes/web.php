<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
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



Route::middleware('auth', 'verified')->group(function () {
    Route::get('/dashboard', [TaskController::class, 'index'])->name('dashboard');       
    Route::get('/create/task', [TaskController::class, 'create'])->name('tasks.create');       
    Route::post('/store/task', [TaskController::class, 'store'])->name('tasks.store');       
    Route::get('/destroy/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');       
    Route::get('/edit/{id}', [TaskController::class, 'edit'])->name('tasks.edit');       
    Route::post('/update/{id}', [TaskController::class, 'update'])->name('tasks.update');       
    Route::get('/completed/{id}', [TaskController::class, 'markCompleted'])->name('tasks.completed');       
    Route::get('/revoke/{id}', [TaskController::class, 'revokeCompleted'])->name('tasks.revoke');       

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
