<?php

namespace App\Charts;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

abstract class Chart
{   
    abstract function sendDataForChart(Request $request);

    protected function jsonResponse($data, $code = 200)
    {
        return response()->json($data, $code,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE);
    }

}
