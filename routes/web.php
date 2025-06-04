<?php

use App\Http\Controllers\NoteController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Models\Note;

Route::get('/', function () {
    $notes = [];
    if (auth()->check()) {
        $notes = auth()->user()->userNotes()->latest()->get();
    }
    return view('note', ['notes' => $notes]);
});

//user
Route::get('/login', [UserController::class, 'showLogin']);
Route::get('/register', [UserController::class, 'showRegister']);
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

//notes
Route::get('/note', [UserController::class, 'showNote'])->middleware('auth');
Route::post('/create-note', [NoteController::class, 'createNote']);
