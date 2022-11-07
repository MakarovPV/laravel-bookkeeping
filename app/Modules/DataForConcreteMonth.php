<?php

namespace App\Modules;

use Carbon\Carbon;

class DataForConcreteMonth extends DataForMonth
{
    /**
     * Получение данных по конкретному месяцу
     * @param $date
     * @param int $userId
     * @return mixed
     */
    public function getDataForMonth($userId, $date)
    {
        $year = intval($date);
        $month = intval(substr($date, -2));

        $firstDayOfConreteDate = Carbon::createFromDate($year, $month)
            ->firstOfMonth()
            ->toDateTimeString();

        $lastDayOfConreteDate = Carbon::createFromDate($year, $month)
            ->lastOfMonth()
            ->toDateTimeString();

        $dataByDates = $this->repository->getDataByUserId($userId)
            ->where('created_at', '<=', $lastDayOfConreteDate)
            ->where('created_at', '>=', $firstDayOfConreteDate);

        return $dataByDates;
    }
}
