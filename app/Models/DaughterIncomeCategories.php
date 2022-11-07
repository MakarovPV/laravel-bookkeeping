<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaughterIncomeCategories extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = ['parent_id', 'source_of_income', 'price'];

    /**
     * @var string
     */
    protected $table = 'daughter_income_categories';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function incomeCategories()
    {
    	return $this->belongsTo(IncomeCategories::class, 'id');
    }
}
