<?php

use Illuminate\Support\Facades\Route;
Route::get('/notes', function  () {return view('notes.index');});
Route::get('/notes/create', function  () {return view('notes.create');});
Route::get('/notes/{id}', function  ($id) {return view('notes.show', ['id' => $id]);});
Route::get('/notes/{id}/edit', function  ($id) {return view('notes.edit', ['id' => $id]);});
