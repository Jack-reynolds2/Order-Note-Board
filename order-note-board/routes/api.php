<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;

Route::get('/notes', [NoteController::class, 'index']);
Route::post('/notes', [NoteController::class, 'store']);
Implement note management UI, functionality and stylingRoute::delete('/notes/{id}', [NoteController::class, 'destroy']);
