<?php

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use Illuminate\Http\Request;
use App\Repositories\ExpensesCategoriesRepository;
use Illuminate\Support\Facades\Auth;

class ExpensesChart extends Chart
{
    private $expensesCategoriesRepository;

    public function __construct(ExpensesCategoriesRepository $expensesCategoriesRepository)
    {
        $this->expensesCategoriesRepository = $expensesCategoriesRepository;
    }

    public function sendDataForChart(Request $request)
    {
        $data = $this->expensesCategoriesRepository->getMonthFromRequest($request, Auth::id());

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