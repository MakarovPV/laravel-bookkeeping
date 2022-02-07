<?php

namespace App\Observers;

use App\Models\ExpensesCategories;
use App\Models\Account;
use Illuminate\Support\Facades\Auth;

class ExpensesCategoriesObserver
{
    /**
     * Handle the User "updated" event.
     *
     * @param  \App\Models\Models\User  $user
     * @return void
     */
    public function updated(ExpensesCategories $expensesCategories)
    {
       // $model = Account::find(1);
       // $model->update(['summary_expenses' => 11]);
        return Account::where('user_id', Auth::id())
               ->update(['summary_expenses' => ExpensesCategories::where('user_id', Auth::id())->sum('price')]);
    }
}
