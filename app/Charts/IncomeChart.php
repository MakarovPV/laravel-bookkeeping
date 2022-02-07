<?php

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use Illuminate\Http\Request;
use App\Repositories\IncomeCategoriesRepository;
use Illuminate\Support\Facades\Auth;

class IncomeChart extends Chart
{
    private $incomeCategoriesRepository;

    public function __construct(IncomeCategoriesRepository $incomeCategoriesRepository)
    {
        $this->incomeCategoriesRepository = $incomeCategoriesRepository;
    }

    public function sendDataForChart(Request $request)
    {
        $data = $this->incomeCategoriesRepository->getMonthFromRequest($request, Auth::id());

        $source_of_income = $data
                      ->pluck('source_of_income')
                      ->values()
                      ->toArray();

        $price = $data->pluck('price')
                      ->values()
                      ->toArray();

        return $this->jsonResponse(Chartisan::build()
                    ->labels($source_of_income)
                    ->dataset('Доходы', $price)
                    ->toObject());
    }
}