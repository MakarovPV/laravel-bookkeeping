<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User;
use App\Models\ExpensesCategories;
use App\Models\IncomeCategories;
use App\Observers\UserObserver;
use App\Observers\ExpensesCategoriesObserver;
use App\Observers\IncomeCategoriesObserver;
use ConsoleTVs\Charts\Registrar as Charts;

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
    public function boot(Charts $charts)
    {
        date_default_timezone_set('Asia/Yekaterinburg');

        $charts->register([
            \App\Charts\IncomeChart::class,
            \App\Charts\ExpensesChart::class
        ]);

        User::observe(UserObserver::class);
        ExpensesCategories::observe(ExpensesCategoriesObserver::class);
        IncomeCategories::observe(IncomeCategoriesObserver::class);
    }
}
