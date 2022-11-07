<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncomeCategories extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = ['user_id', 'source_of_income', 'price'];

    /**
     * @var string
     */
    protected $table = 'income_categories';
}
