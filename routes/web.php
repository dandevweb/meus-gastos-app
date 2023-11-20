<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExpensePhotoController;

use App\Livewire\{
    Expense,
    Plan,
};


Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])
    ->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

        Route::prefix('expenses')->name('expenses.')->group(callback: function () {

            Route::get('/', Expense\Index::class)->name('index');
            Route::get('create', Expense\Create::class)->name('create');
            Route::get('edit/{expense}', Expense\Edit::class)->name('edit');

            Route::get('/{expense}/photo', ExpensePhotoController::class)
                ->name('photo');
        });

        Route::prefix('plans')->name('plans.')->group(callback: function () {
            Route::get('/', Plan\Index::class)->name('index');
            Route::get('/create', Plan\Create::class)->name('create');
            Route::get('/edit/{plan}', Plan\Edit::class)->name('edit');
        });
    });

