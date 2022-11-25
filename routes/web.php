<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => 'auth.check'], function(){
    Route::get('/', [App\Http\Controllers\RenderController::class, 'index'])->name('render.index');

    Route::prefix('income')->group(function(){
        Route::post('/', [App\Http\Controllers\IncomeCategoriesController::class, 'store'])->name('income.categories.store');
        Route::post('/update/{id}', [App\Http\Controllers\IncomeCategoriesController::class, 'update'])->name('income.categories.update');
        Route::post('/delete/{id}', [App\Http\Controllers\IncomeCategoriesController::class, 'destroy'])->name('income.categories.destroy');
    });

    Route::prefix('expenses')->group(function() {
        Route::post('/', [App\Http\Controllers\ExpensesCategoriesController::class, 'store'])->name('expenses.categories.store');
        Route::post('/update/{id}', [App\Http\Controllers\ExpensesCategoriesController::class, 'update'])->name('expenses.categories.update');
        Route::post('/delete/{id}', [App\Http\Controllers\ExpensesCategoriesController::class, 'destroy'])->name('expenses.categories.destroy');
    });
});

Route::prefix('build')->group(function() {
    Route::get('/income/', [App\Http\Controllers\Charts\IncomeChartController::class, 'sendDataForChart'])->name('build.income');
    Route::get('/expenses/', [App\Http\Controllers\Charts\ExpensesChartController::class, 'sendDataForChart'])->name('build.expenses');
    Route::get('/income_and_expenses', [App\Http\Controllers\Charts\IncomeExpensesCompareChartController::class, 'sendDataForChart'])->name('build.income_and_expenses');
});

Auth::routes();

