<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExpensePhotoController;

use App\Livewire\Expense\{
    Create,
    Edit,
    Index,
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

       Route::get('create', Create::class)->name('create');
       Route::get('edit/{expense}', Edit::class)->name('edit');
       Route::get('/', Index::class)->name('index');

       Route::get('/{expense}/photo', ExpensePhotoController::class)
           ->name('photo');
    });
});

