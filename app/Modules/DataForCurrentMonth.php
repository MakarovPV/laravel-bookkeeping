<?php

namespace App\Modules;

use Carbon\Carbon;

class DataForCurrentMonth extends DataForMonth
{
    /**
     * Получение данных по текущему месяцу
     * @param int $userId
     * @return mixed
     */
    public function getDataForMonth($userId, $date = 'current')
    {
        $dateNow = Carbon::now()->toDateTimeString();
        $dateFirstDayOfMonth = Carbon::now()
            ->firstOfMonth()
            ->toDateTimeString();

        $dataByDates = $this->repository->getDataByUserId($userId)
            ->where('created_at', '<=', $dateNow)
            ->where('created_at', '>=', $dateFirstDayOfMonth);

        return $dataByDates;
    }
}
