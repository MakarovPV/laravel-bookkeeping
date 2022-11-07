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

Route::get('/', [App\Http\Controllers\RenderController::class, 'index'])->name('render.index');

Route::get('/build/income/', [App\Http\Controllers\Charts\IncomeChartController::class, 'sendDataForChart'])->name('build.income');
Route::get('/build/expenses/', [App\Http\Controllers\Charts\ExpensesChartController::class, 'sendDataForChart'])->name('build.expenses');
Route::get('/build/income_and_expenses', [App\Http\Controllers\Charts\IncomeExpensesCompareChartController::class, 'sendDataForChart'])->name('build.income_and_expenses');

Route::post('/income', [App\Http\Controllers\IncomeCategoriesController::class, 'store'])->name('income.categories.store');
Route::post('/income/update/{id}', [App\Http\Controllers\IncomeCategoriesController::class, 'update'])->name('income.categories.update');
Route::post('/income/delete/{id}', [App\Http\Controllers\IncomeCategoriesController::class, 'destroy'])->name('income.categories.destroy');

Route::post('/expenses', [App\Http\Controllers\ExpensesCategoriesController::class, 'store'])->name('expenses.categories.store');
Route::post('/expenses/update/{id}', [App\Http\Controllers\ExpensesCategoriesController::class, 'update'])->name('expenses.categories.update');
Route::post('/expenses/delete/{id}', [App\Http\Controllers\ExpensesCategoriesController::class, 'destroy'])->name('expenses.categories.destroy');

Auth::routes();

Route::get('/home', function () {
    return redirect('/');
});

