<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::get('/data/{status}/{page}', [ApiController::class, 'show'])->name('data');
Route::get('/pet/new', [ApiController::class, 'showForm']);
Route::post('/submit', [ApiController::class, 'submitForm'])->name('form.submit');
Route::delete('/pet/{id}', [ApiController::class, 'deletePet'])->name('pet.delete');
Route::get('/pet/edit/{id}', [ApiController::class, 'editPet']);

Route::get('/', function () {
    return redirect()->route('data', ['status' => 'available', 'page' => 1]);
});
