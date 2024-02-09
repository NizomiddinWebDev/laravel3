<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use App\Models\Application;
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

Route::get('/', function () {
    return redirect('/dashboard');
})->middleware('auth');






Route::middleware('auth')->group(function () {
    Route::get('/',[MainController::class,'main'])->name('main');
    Route::get('/dashboard',[MainController::class,'dashboard'])->name('dashboard');
    Route::get('/dashboard/users',[MainController::class,'users'])->name('main.users');
    Route::get('/dashboard/users/search',[MainController::class,'search'])->name('main.search');
    Route::delete('/dashboard',[MainController::class,'destroy'])->name('main.destroy');
    Route::get('dashboard/{application}/user', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('applications/{application}/answer',[AnswerController::class,'create'])->name('answer.create');
    Route::post('applications/{application}/answer',[AnswerController::class,'store'])->name('answer.store');
    Route::resource('application',ApplicationController::class);
});



require __DIR__.'/auth.php';
