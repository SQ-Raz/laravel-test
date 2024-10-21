<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommunityLinkController;

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

Route::get('/dashboard', [CommunityLinkController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::post('/dashboard', [CommunityLinkController::class, 'store'])
    ->middleware(['auth', 'verified']);

Route::get('/contact', function () {
    return view('contact');
})->middleware(['auth', 'verified'])->name('contact');


Route::get('/my-links', [CommunityLinkController::class, 'myLinks'])
->middleware(['auth', 'verified'])->name('my-links');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
