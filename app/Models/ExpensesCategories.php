<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpensesCategories extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = ['user_id', 'source_of_expenses', 'price'];

    /**
     * @var string
     */
    protected $table = 'expenses_categories';
}
