<?php

declare(strict_types = 1);

namespace App\Libraries\Chartisan\Php\Src;

/**
 * Represents the chart information.
 */
class ChartData
{
    /**
     * Stores the chart labels.
     *
     * @var string[]
     */
    public array $labels = [];

    /**
     * Stores the extra information of the chart if needed.
     *
     * @var array|null
     */
    public ?array $extra = null;
}
