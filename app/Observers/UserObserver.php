<?php

namespace App\Observers;

use App\Models\User;
use App\Models\Account;

class UserObserver
{
    /**
     * Создание поля с данными пользователя при его регистрации.
     * @param User $user
     * @return mixed
     */
    public function created(User $user)
    {
        return Account::create([
            'user_id' => $user->id,
        ]);
    }
}
