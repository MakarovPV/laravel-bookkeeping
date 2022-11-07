<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = ['user_id', 'summary_income', 'summary_expenses' ];

    /**
     * @var string
     */
    protected $table = 'account';
}
