<?php

namespace App\Repositories;

use App\Models\ExpensesCategories;

class ExpensesCategoriesRepository extends CoreRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return ExpensesCategories::class;
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getDataByUserId($id)
    {
    	return $this->model->select('id', 'source_of_expenses', 'price')->where('user_id', $id);
    }
}
