<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User;
use App\Models\ExpensesCategories;
use App\Models\IncomeCategories;
use App\Observers\UserObserver;
use App\Observers\ExpensesCategoriesObserver;
use App\Observers\IncomeCategoriesObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        date_default_timezone_set('Asia/Yekaterinburg');
        User::observe(UserObserver::class);
    }
}
