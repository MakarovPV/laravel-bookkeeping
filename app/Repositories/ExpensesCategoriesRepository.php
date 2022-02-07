<?php

namespace App\Repositories;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use App\Models\ExpensesCategories;;

/**
 * Class ExpensesCategoriesRepository.
 */
class ExpensesCategoriesRepository extends CoreRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return ExpensesCategories::class;
    }

    public function getDataByUserId($id)
    {
    	return $this->model->select('id', 'source_of_expenses', 'price')->where('user_id', $id);
    }
}
