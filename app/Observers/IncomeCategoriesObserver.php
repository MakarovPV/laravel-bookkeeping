<?php

namespace App\Observers;

use App\Models\IncomeCategories;
use App\Models\Account;
use Illuminate\Support\Facades\Auth;

class IncomeCategoriesObserver
{
    /**
     * Handle the User "updated" event.
     *
     * @param  \App\Models\Models\User  $user
     * @return void
     */
    public function updated(IncomeCategories $incomeCategories)
    {
        return Account::where('user_id', Auth::id())
               ->update(['summary_income' => IncomeCategories::where('user_id', Auth::id())->sum('price')]);
    }
}
