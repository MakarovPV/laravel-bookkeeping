<?php

namespace App\Modules;

use App\Repositories\CoreRepository;

class Dates
{
    private $repository;

    public function __construct(CoreRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param int $userId
     * @param string $value
     * @return mixed
     */
    public function getMonthFromRequest($request, $userId, $value = 'date')
    {
        $date = $request->all();

        if(isset($date[$value])){
            switch ($date[$value]) {
                case 'current':
                    return (new DataForCurrentMonth($this->repository))->getDataForMonth($userId);
                case 'previous':
                    return (new DataForPreviousMonth($this->repository))->getDataForMonth($userId);
                default:
                    return (new DataForConcreteMonth($this->repository))->getDataForMonth($userId, $date[$value]);
            }
        }
        return (new DataForCurrentMonth($this->repository))->getDataForMonth($userId);
    }
}
