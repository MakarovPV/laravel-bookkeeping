<?php

namespace App\Observers;

use App\Models\User;
use App\Models\Account;
use Illuminate\Support\Facades\Auth;

class UserObserver
{
    /**
     * Создание поля с данными пользователя при его регистрации.
     *
     * @param  \App\Models\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {
        return Account::create([
            'user_id' => $user->id,
        ]);
    }
}
