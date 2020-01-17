<?php

namespace App\Hotels\Providers\Abstracts;

interface HotelProvider
{
    /**
     * @param string $from
     * @param string $to
     * @param string $cityIataCode
     * @param int $numberOfAdults
     * @return \Illuminate\Support\Collection
     */
    public function findMany(string $from, string $to, string $cityIataCode, int $numberOfAdults);
}
