<?php

use App\Http\Controllers\ApplyController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ProfileController;
use App\Models\Apply;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
  return Inertia::render('Welcome', [
    'canLogin' => Route::has('login'),
    'canRegister' => Route::has('register'),
    'laravelVersion' => Application::VERSION,
    'phpVersion' => PHP_VERSION,
  ]);
});

Route::get('/dashboard', function () {
  return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

  Route::resource('/jobs', JobController::class);

  Route::get('/apply/{job}', [ApplyController::class, 'create'])->name('apply.create')->middleware(['can:create:apply']);
  Route::post('/apply/{job}', [ApplyController::class, 'store'])->name('apply.store')->middleware(['can:create:apply']);

  Route::get('/applies', [ApplyController::class, 'index'])->name('apply.index')->middleware(['can:show:apply']);
});



require __DIR__ . '/auth.php';
