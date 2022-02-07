<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncomeCategories extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'source_of_income', 'price'];

    protected $table = 'income_categories';

    public function daughterIncomeCategories()
    {
    	return $this->hasMany(DaughterIncomeCategories::class, 'parent_id');
    }
}
