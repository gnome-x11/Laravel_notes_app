<?php

use App\Http\Controllers\NoteController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $notes = [];
    if (auth()->check()) {
        $notes = auth()->user()->userNotes()->latest()->get();
        return view('note', ['notes' => $notes]);
    }

    return view('/welcome'); // show landing page or login prompt
});


//user
Route::get('/login', [UserController::class, 'showLogin']);
Route::get('/register', [UserController::class, 'showRegister']);
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout']);

//notes
Route::get('/note', [UserController::class, 'showNote'])->middleware('auth');
Route::post('/create-note', [NoteController::class, 'createNote']);

Route::get('/edit_note/{note}', [NoteController::class, 'showEditScreen']);
Route::put('/edit_note/{note}', [NoteController::class, 'updateNote']);

Route::delete('/delete_note/{note}', [NoteController::class, 'deleteNote']);
