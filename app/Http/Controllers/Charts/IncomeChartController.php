<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Charts;

use App\Libraries\Chartisan\Chartisan;
use App\Modules\Dates;
use Illuminate\Http\Request;
use App\Repositories\IncomeCategoriesRepository;
use Illuminate\Support\Facades\Auth;

class IncomeChartController extends ChartController
{
    private $incomeCategoriesRepository;

    public function __construct(IncomeCategoriesRepository $incomeCategoriesRepository)
    {
        $this->incomeCategoriesRepository = $incomeCategoriesRepository;
    }

    /**
     * Отправка данных в диаграмму
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendDataForChart(Request $request)
    {
        $data = (new Dates($this->incomeCategoriesRepository))->getMonthFromRequest($request, Auth::id());

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
