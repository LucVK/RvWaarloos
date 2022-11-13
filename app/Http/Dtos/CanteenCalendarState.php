<?php

namespace App\Http\Dtos;

use DateTime;
use Spatie\LaravelData\Data;

class CanteenCalendarState extends Data
{
    public function __construct(
        public DateTime $currentDate,
    ) {
    }
}
