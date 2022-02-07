<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

trait Dates
{ 
    public function getMonthFromRequest($request, $userId, $value = 'date')
    {
        $date = $request->all();

        if(isset($date[$value])){
            switch ($date[$value]) {
                case 'current':
                    return $this->getCurrentMonth($userId);
                case 'previous':
                    return $this->getPreviousMonth($userId); 
                default:
                    return $this->getConcreteMonth($date[$value], $userId); 
            };
        };    
        return $this->getCurrentMonth($userId);
    }

    public function getCurrentMonth($userId)
    {
        $dateNow = Carbon::now()->toDateTimeString();
        $dateFirstDayOfMonth = Carbon::now()
                                    ->firstOfMonth()
                                    ->toDateTimeString();

        $dataByDates = $this->getDataByUserId($userId)
                                    ->where('created_at', '<=', $dateNow)
                                    ->where('created_at', '>=', $dateFirstDayOfMonth);

        return $dataByDates;
    }

    public function getPreviousMonth($userId)
    {
        $dateLastDayOfPreviousMonth = Carbon::now()
                                   ->subMonths(1)
                                   ->endOfMonth()
                                   ->toDateTimeString();

        $dateFirstDayOfPreviousMonth = Carbon::now()
                                   ->subMonths(1)
                                   ->firstOfMonth()
                                   ->toDateTimeString();

        $dataByDates = $this->getDataByUserId($userId)
                                   ->where('created_at', '<=', $dateLastDayOfPreviousMonth)
                                   ->where('created_at', '>=', $dateFirstDayOfPreviousMonth);
       
        return $dataByDates;
    }

    public function getConcreteMonth($date, $userId)
    {
        $year = intval($date);
        $month = intval(substr($date, -2));

        $firstDayOfConreteDate = Carbon::createFromDate($year, $month)
                                      ->firstOfMonth()
                                      ->toDateTimeString();

        $lastDayOfConreteDate = Carbon::createFromDate($year, $month)
                                      ->lastOfMonth()
                                      ->toDateTimeString();

        $dataByDates = $this->getDataByUserId($userId)
                                      ->where('created_at', '<=', $lastDayOfConreteDate)
                                      ->where('created_at', '>=', $firstDayOfConreteDate);
       
        return $dataByDates;
    }
}
