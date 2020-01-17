<?php

namespace App\Hotels\Providers;

use App\Hotels\Hotel;
use App\Hotels\Apis\BestHotelApi;
use App\Hotels\Providers\Abstracts\HotelProvider;

class BestHotelProvider implements HotelProvider
{
    const PROVIDER_NAME = 'BestHotel';

    /**
     * @var BestHotelApi
     */
    private $api;

    /**
     * BestHotelProvider constructor.
     * @param BestHotelApi $api
     */
    public function __construct(BestHotelApi $api)
    {
        $this->api = $api;
    }

    /**
     * @param string $from
     * @param string $to
     * @param string $cityIataCode
     * @param int $numberOfAdults
     * @return array
     */
    public function findMany(string $from, string $to, string $cityIataCode, int $numberOfAdults): array
    {
        $hotelsApiResult = $this->api->getHotels($from, $to, $cityIataCode, $numberOfAdults);

        foreach ($hotelsApiResult as $hotelAttributes) {
            $hotels[] = $this->createHotelInstance($hotelAttributes);
        }

        return $hotels ?? [];
    }

    /**
     * Create an object from Hotel and Hydrate it.
     *
     * @param $hotelAttributes
     * @return Hotel
     */
    public function createHotelInstance($hotelAttributes): Hotel
    {
        return  (new Hotel)
            ->setName($hotelAttributes['hotel'])
            ->setProvider(static::PROVIDER_NAME)
            ->setFare($hotelAttributes['hotelFare'])
            ->setRate($hotelAttributes['hotelRate'])
            ->setAmenities(explode(',', $hotelAttributes['roomAmenities']));
    }
}
