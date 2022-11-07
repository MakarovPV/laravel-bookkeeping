<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Charts;

use App\Libraries\Chartisan\Chartisan;
use App\Modules\Dates;
use Illuminate\Http\Request;
use App\Repositories\IncomeCategoriesRepository;
use App\Repositories\ExpensesCategoriesRepository;
use Illuminate\Support\Facades\Auth;

class IncomeExpensesCompareChartController extends ChartController
{
    /**
     * @var IncomeCategoriesRepository
     */
    private $incomeCategoriesRepository;

    /**
     * @var ExpensesCategoriesRepository
     */
    private $expensesCategoriesRepository;

    public function __construct(IncomeCategoriesRepository $incomeCategoriesRepository, ExpensesCategoriesRepository $expensesCategoriesRepository)
    {
        $this->incomeCategoriesRepository = $incomeCategoriesRepository;
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
        $income = (new Dates($this->incomeCategoriesRepository))->getMonthFromRequest($request, Auth::id());
        $expenses = (new Dates($this->expensesCategoriesRepository))->getMonthFromRequest($request, Auth::id());

        $source_of_income = $income
                        ->pluck('source_of_income')
                        ->values()
                        ->toArray();

        $price_income = $income
                        ->pluck('price')
                        ->values()
                        ->toArray();

        $source_of_expenses = $expenses
                        ->pluck('source_of_expenses')
                        ->values()
                        ->toArray();

        $price_expenses = $expenses
                        ->pluck('price')
                        ->values()
                        ->toArray();

        return $this->jsonResponse(Chartisan::build()
                    ->labels($source_of_income)
                    ->labels($source_of_expenses)
                    ->dataset('Доходы', $price_income)
                    ->dataset('Расходы', $price_expenses)
                    ->toObject());
    }
}
