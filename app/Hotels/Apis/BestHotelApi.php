<?php

namespace App\Hotels\Apis;

/**
 * Class BestHotelApi
 *
 * @package App\Hotels\Apis
 */
class BestHotelApi
{
    /**
     * @var \Illuminate\Support\Collection
     */
    private $data;

    public function __construct()
    {
        $this->data = collect([
            [
                'hotel' => 'Excellent Hotel',
                'hotelRate' => 5,
                'hotelFare' => 399.99,
                'roomAmenities' => 'TV,Wifi,Wireless Speaker,Local travel guides,A showerhead with wireless speaker',
            ],
            [
                'hotel' => 'Good Hotel',
                'hotelRate' => 4,
                'hotelFare' => 299.99,
                'roomAmenities' => 'TV,Wifi,Wireless Speaker,Local travel guides',
            ],
            [
                'hotel' => 'Another Good Hotel',
                'hotelRate' => 4,
                'hotelFare' => 289,
                'roomAmenities' => 'TV,Wifi,Local travel guides',
            ],
            [
                'hotel' => 'Not Bad Hotel',
                'hotelRate' => 2,
                'hotelFare' => 149.99,
                'roomAmenities' => 'Wifi,Local travel guides',
            ],
        ]);
    }

    /**
     * Mimic the api http request.
     *
     * @param string $fromDate
     * @param string $toDate
     * @param string $city
     * @param int $numberOfAdults
     * @return array
     */
    public function getHotels(string $fromDate, string $toDate, string $city, int $numberOfAdults): array
    {
        return $this->data->toArray();
    }
}
