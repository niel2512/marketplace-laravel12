<?php

use App\Http\Controllers\CoaController;
use App\Http\Controllers\TokoController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
        Route::get('/', function () {
            return redirect('/login');
        });

        Route::get('/dashboard', function () {
            return view('dashboardbootstrap');
        })->name('dashboardbootstrap');

        Route::resource('toko', TokoController::class);
        
        });

        Route::controller(CoaController::class)->group(function () {
        Route::get('/coa', 'index');
        Route::get('/coa/fetchcoa','fetchcoa');
        Route::get('/coa/edit/{id}', 'edit');
        Route::get('/coa/destroy/{id}','destroy');
        });

        Route::middleware([
            'auth:sanctum',
            config('jetstream.auth_session'),
            'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
        ]);