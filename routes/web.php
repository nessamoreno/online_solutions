<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\MessageController;
use App\Models\Chat;

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
    Route::get('/publications/chats',[ChatController::class,'list'])->name('chat.list');
    Route::get('/publications/{id_publication}/chat/{id_user_guest}', [ChatController::class,'create'])->name('chat.create');
    Route::get('/publications/chat/show/{id_publication}', [ChatController::class,'show'])->name('chat.show');

    //Route messages
    Route::post('/publications/{id_publication}/chat/{id_chat}/messages',[MessageController::class,'create'])->name('messages.create');
});

require __DIR__.'/auth.php';