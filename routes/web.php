<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\ChatController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[PublicationController::class,'indexp']);

Route::get('/dashboard', [PublicationController::class,'index']) 
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    //Routes publications
    Route::get('/publications/new', [PublicationController::class, 'new'])->name('publication.new');
    Route::post('/publications',[PublicationController::class,'create'])->name('publication.create');
    Route::get('/publications/myposts',[PublicationController::class,'show'])->name('publication.show');


    //Routes chats
    Route::get('/chats', [ChatController::class,'index'])->name('chat.index');

});

// Route::get('/publications/new', [PublicationController::class,'create']) 
//     ->middleware(['auth', 'verified'])
//     ->name('publication.new');

require __DIR__.'/auth.php';
