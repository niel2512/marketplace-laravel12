<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TokoController;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/dashboard', function () {
    return view('dashboardbootstrap');
})->middleware(['auth'])->name('dashboardbootstrap');

Route::resource('toko', App\Http\Controllers\TokoController::class)->middleware(['auth']);
Route::get('/toko/destroy/{id}', [App\Http\Controllers\TokoController::class,'destroy'])->middleware(['auth']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
]);
