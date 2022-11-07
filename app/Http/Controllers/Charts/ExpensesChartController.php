<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Charts;

use App\Libraries\Chartisan\Chartisan;
use App\Modules\Dates;
use Illuminate\Http\Request;
use App\Repositories\ExpensesCategoriesRepository;
use Illuminate\Support\Facades\Auth;

class ExpensesChartController extends ChartController
{
    private $expensesCategoriesRepository;

    public function __construct(ExpensesCategoriesRepository $expensesCategoriesRepository)
    {
        $this->expensesCategoriesRepository = $expensesCategoriesRepository;
    }

    /**
     * Отправка данных в диаграмму
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendDataForChart(Request $request)
    {
        $data = (new Dates($this->expensesCategoriesRepository))->getMonthFromRequest($request, Auth::id());

        $source_of_expenses = $data
                      ->pluck('source_of_expenses')
                      ->values()
                      ->toArray();

        $price = $data->pluck('price')
                      ->values()
                      ->toArray();

        return $this->jsonResponse(Chartisan::build()
                    ->labels($source_of_expenses)
                    ->dataset('Расходы', $price)
                    ->toObject());
    }

}
