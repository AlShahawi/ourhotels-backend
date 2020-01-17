<?php

namespace App\Hotels\Providers;

use Carbon\Carbon;
use App\Hotels\Hotel;
use App\Hotels\Apis\TopHotelsApi;
use App\Hotels\Providers\Abstracts\HotelProvider;

class TopHotelsProvider implements HotelProvider
{
    const PROVIDER_NAME = 'TopHotels';

    /**
     * @var TopHotelsApi
     */
    private $api;

    /**
     * BestHotelProvider constructor.
     * @param TopHotelsApi $api
     */
    public function __construct(TopHotelsApi $api)
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
        $hotelsApiResult = $this->api->findHotels(
            Carbon::parse($from)->toIso8601ZuluString(),
            Carbon::parse($to)->toIso8601ZuluString(),
            $cityIataCode,
            $numberOfAdults
        );

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
        $hotel = (new Hotel)
            ->setProvider(static::PROVIDER_NAME)
            ->setName($hotelAttributes['hotelName'])
            ->setFare($hotelAttributes['price'])
            ->setRate(strlen($hotelAttributes['rate']))
            ->setAmenities($hotelAttributes['amenities']);

        if (isset($hotelAttributes['discount'])) {
            $hotel->setDiscount($hotelAttributes['discount']);
        }

        return $hotel;
    }
}
