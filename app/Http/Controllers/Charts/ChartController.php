<?php

namespace App\Http\Controllers\Charts;

use Illuminate\Http\Request;

abstract class ChartController
{
    /**
     * Отправка данных в диаграмму
     *
     * @param Request $request
     */
    abstract function sendDataForChart(Request $request);

    /**
     * Конвертация ответа в JSON
     *
     * @param App\Libraries\Chartisan\Chartisan $data
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    protected function jsonResponse($data, $code = 200)
    {
        return response()->json($data, $code,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE);
    }

}
