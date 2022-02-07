<?php

namespace App\Repositories;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use App\Models\IncomeCategories;;

/**
 * Class IncomeCategoriesRepository.
 */
class IncomeCategoriesRepository extends CoreRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return IncomeCategories::class;
    }

    public function getDataByUserId($id)
    {
    	return $this->model->select('id', 'source_of_income', 'price')->where('user_id', $id);
    }
}
