<?php

namespace App\Modules;

use App\Repositories\CoreRepository;

abstract class DataForMonth
{
    protected $repository;

    public function __construct(CoreRepository $repository)
    {
        $this->repository = $repository;
    }

    abstract public function getDataForMonth($userId, $date);
}
