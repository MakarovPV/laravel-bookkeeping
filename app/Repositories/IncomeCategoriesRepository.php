<?php

namespace App\Repositories;

use App\Models\IncomeCategories;

class IncomeCategoriesRepository extends CoreRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return IncomeCategories::class;
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getDataByUserId($id)
    {
    	return $this->model->select('id', 'source_of_income', 'price')->where('user_id', $id);
    }
}
