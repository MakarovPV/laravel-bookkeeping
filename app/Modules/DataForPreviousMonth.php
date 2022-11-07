<?php

namespace App\Modules;

use Carbon\Carbon;

class DataForPreviousMonth extends DataForMonth
{
    /**
     * Получение данных по предыдущему месяцу
     * @param int $userId
     * @return mixed
     */
    public function getDataForMonth($userId, $date = 'previous')
    {
        $dateLastDayOfPreviousMonth = Carbon::now()
            ->subMonths(1)
            ->endOfMonth()
            ->toDateTimeString();

        $dateFirstDayOfPreviousMonth = Carbon::now()
            ->subMonths(1)
            ->firstOfMonth()
            ->toDateTimeString();

        $dataByDates = $this->repository->getDataByUserId($userId)
            ->where('created_at', '<=', $dateLastDayOfPreviousMonth)
            ->where('created_at', '>=', $dateFirstDayOfPreviousMonth);

        return $dataByDates;
    }
}
